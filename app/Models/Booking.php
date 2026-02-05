<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * Mendefinisikan kolom yang dapat diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'nama_peminjam',
        'nim',
        'ruangan',
        'tanggal_pinjam',
        'tujuan',
        'status',
    ];

    /**
     * Default nilai untuk kolom tertentu jika diperlukan.
     */
    protected $attributes = [
        'status' => 'Pending',
    ];
}