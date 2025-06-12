<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('peminjaman');
            $table->text('catatan_pengembalian')->nullable();
            $table->foreignId('lokasi_id')->constrained('lokasi');
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak', 'Selesai']);
            $table->enum('kondisi_sesudah', ['Baik', 'Perlu Service', 'Rusak']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengembalians');
    }
};