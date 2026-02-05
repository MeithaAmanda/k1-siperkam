<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $attribute) {
            $attribute->id();
            $attribute->string('nama_peminjam');
            $attribute->string('nim');
            $attribute->string('ruangan'); 
            $attribute->date('tanggal_pinjam');
            $attribute->text('tujuan');
            $attribute->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');
            $attribute->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};