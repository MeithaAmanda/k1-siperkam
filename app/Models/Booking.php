<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peminjam',
        'nim',
        'ruangan',
        'tanggal_pinjam',
        'tujuan',
        'status',
    ];
}