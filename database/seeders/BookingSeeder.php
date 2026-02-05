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
        Booking::create([
            'nama_peminjam' => 'Jeon Jungkook',
            'nim' => '2206001',
            'ruangan' => 'Lab Komputer',
            'tanggal_pinjam' => now()->format('Y-m-d'),
            'tujuan' => 'Praktikum Pemrograman Web',
            'status' => 'Disetujui',
        ]);

        Booking::create([
            'nama_peminjam' => 'Min Yoongi',
            'nim' => '2206002',
            'ruangan' => 'Aula Multimedia',
            'tanggal_pinjam' => now()->addDays(2)->format('Y-m-d'),
            'tujuan' => 'Seminar Himpunan',
            'status' => 'Pending',
        ]);
    }
}