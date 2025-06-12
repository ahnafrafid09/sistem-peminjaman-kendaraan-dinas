<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['pegawai', 'super_admin', 'kepala_unit'])->default('pegawai');
            $table->foreignId('jurusan_id')->constrained('jurusan');
            $table->foreignId('prodi_id')->nullable()->constrained('prodi');
            $table->string('no_telepon', 15);
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            $table->string('nik', 20);
            $table->text('alamat')->nullable();
            $table->string('foto_profil')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
