<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('mobil_id')->constrained('mobil');
            $table->date('tanggal_peminjaman');
            $table->time('jam_peminjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->time('jam_pengembalian')->nullable();
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak', 'Selesai'])->default('Diproses');
            $table->enum('kondisi_sebelum', ['Baik', 'Perlu Service', 'Rusak']);
            $table->enum('kondisi_sesudah', ['Baik', 'Perlu Service', 'Rusak'])->nullable();
            $table->boolean('kepemilikan_sim');
            $table->text('alasan_peminjaman');
            $table->text('tujuan');
            $table->foreignId('kepala_unit_id')->constrained('users');
            $table->text('catatan_kepala_unit')->nullable();
            $table->foreignId('lokasi_id')->nullable()->constrained('lokasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};