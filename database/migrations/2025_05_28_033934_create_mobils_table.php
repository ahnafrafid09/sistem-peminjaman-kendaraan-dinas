<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merek_mobil_id')->constrained('merek_mobil');
            $table->foreignId('lokasi_awal')->constrained('lokasi');
            $table->string('plat_nomor', 20)->unique();
            $table->integer('tahun_pembuatan');
            $table->enum('status_ketersediaan', ['Tersedia', 'Dipinjam', 'Dalam Perbaikan'])->default('Tersedia');
            $table->enum('status_kondisi', ['Baik', 'Perlu Service', 'Rusak'])->default('Baik');
            $table->integer('kapasitas_penumpang');
            $table->string('warna', 50);
            $table->foreignId('jurusan_id')->constrained('jurusans');
            $table->date('tanggal_servis_terakhir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mobil');
    }
};