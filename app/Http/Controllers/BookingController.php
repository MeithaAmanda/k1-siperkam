<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar peminjaman (Index).
     */
    public function index(Request $request)
    {
        $query = Booking::query();

        if ($request->has('search')) {
            $query->where('nama_peminjam', 'like', '%' . $request->search . '%')
                  ->orWhere('ruangan', 'like', '%' . $request->search . '%');
        }

        $bookings = $query->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Menampilkan form tambah data.
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Proses Simpan Data dengan Validasi Ketat.
     */
    public function store(Request $request)
    {
        // Validasi Form sesuai best practice
        $validatedData = $request->validate([
            'nama_peminjam'  => 'required|string|max:255',
            'nim'            => 'required|numeric|digits_between:8,15',
            'ruangan'        => 'required|in:Aula ITG,Lab Komputer,Ruang Kelas A1',
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            'tujuan'         => 'required|string|min:10',
        ], [
            'required'       => ':attribute wajib diisi!',
            'numeric'        => 'NIM harus berupa angka.',
            'after_or_equal' => 'Tanggal tidak boleh di masa lalu.',
            'min'            => 'Tujuan peminjaman minimal 10 karakter.'
        ]);

        // Simpan ke database
        Booking::create($validatedData);

        return redirect()->route('bookings.index')->with('success', 'Permohonan peminjaman berhasil dikirim!');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Proses Update Data
     */
    public function update(Request $request, Booking $booking)
    {
        $validatedData = $request->validate([
            'nama_peminjam'  => 'required|string|max:255',
            'nim'            => 'required|numeric',
            'ruangan'        => 'required',
            'tanggal_pinjam' => 'required|date',
            'tujuan'         => 'required|min:10',
        ]);

        $booking->update($validatedData);

        return redirect()->route('bookings.index')->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    /**
     * Proses Hapus Data
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Data peminjaman telah dihapus.');
    }
}