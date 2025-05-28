<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('peminjamans');
            $table->date('tanggal_pengembalian');
            $table->foreignId('lokasi_pengembalian')->constrained('lokasi');
            $table->enum('kondisi_sesudah', ['Baik', 'Perlu Service', 'Rusak']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengembalians');
    }
};