<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('mobil_id')->constrained();
            $table->date('tanggal_peminjaman');
            $table->time('jam_peminjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->time('jam_pengembalian')->nullable();
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak', 'Selesai'])->default('Diproses');
            $table->enum('kondisi_sebelum', ['Baik', 'Perlu Service', 'Rusak']);
            $table->enum('kondisi_sesudah', ['Baik', 'Perlu Service', 'Rusak'])->nullable();
            $table->text('alasan_peminjaman');
            $table->text('tujuan');
            $table->foreignId('kepala_unit_id')->constrained('users');
            $table->text('catatan_kepala_unit')->nullable();
            $table->text('catatan_pengembalian')->nullable();
            $table->foreignId('lokasi_peminjaman')->nullable()->constrained('lokasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};