<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Menjalankan seeder untuk mengisi data awal SIPERKAM.
     */
    public function run(): void
    {
        // Data Dummy untuk testing dashboard ITG
        Booking::create([
            'nama_peminjam' => 'Meitha Amanda',
            'nim' => '2206001',
            'ruangan' => 'Lab Komputer',
            'tanggal_pinjam' => now()->format('Y-m-d'),
            'tujuan' => 'Praktikum Pemrograman Web Kelompok 1',
            'status' => 'Disetujui',
        ]);

        Booking::create([
            'nama_peminjam' => 'Budi Santoso',
            'nim' => '2206002',
            'ruangan' => 'Aula ITG',
            'tanggal_pinjam' => now()->addDays(2)->format('Y-m-d'),
            'tujuan' => 'Seminar Himpunan Mahasiswa Sistem Informasi',
            'status' => 'Pending',
        ]);
    }
}