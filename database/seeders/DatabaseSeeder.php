<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\MerekMobil;
use App\Models\Lokasi;
use App\Models\Mobil;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Jurusan
        $jurusan = \App\Models\Jurusan::create(['nama_jurusan' => 'Teknik Informatika']);
        $jurusan2 = \App\Models\Jurusan::create(['nama_jurusan' => 'Teknik Mesin']);

        // Create Prodi
        $prodi1 = \App\Models\Prodi::create([
            'jurusan_id' => $jurusan->id,
            'nama_prodi' => 'Animasi'
        ]);

        $prodi2 = \App\Models\Prodi::create([
            'jurusan_id' => $jurusan->id,
            'nama_prodi' => 'Teknik Informatika'
        ]);

        // Create Lokasi
        $lokasi = \App\Models\Lokasi::create(['lokasi' => 'Garasi Kampus A']);
        $lokasi2 = \App\Models\Lokasi::create(['lokasi' => 'Parkiran Mahasiswa']);

        // Create Merek Mobil
        $toyota = \App\Models\MerekMobil::create(['nama' => 'Toyota']);
        $honda = \App\Models\MerekMobil::create(['nama' => 'Honda']);

        // Create Mobil
        \App\Models\Mobil::create([
            'merek_mobil_id' => $toyota->id,
            'lokasi_awal' => $lokasi->id,
            'plat_nomor' => 'B 1234 ABC',
            'tahun_pembuatan' => 2020,
            'status_ketersediaan' => 'Tersedia',
            'status_kondisi' => 'Baik',
            'kapasitas_penumpang' => 5,
            'warna' => 'Hitam',
            'jurusan_id' => $jurusan->id,
            'tanggal_servis_terakhir' => '2025-01-10'
        ]);

        \App\Models\Mobil::create([
            'merek_mobil_id' => $honda->id,
            'lokasi_awal' => $lokasi2->id,
            'plat_nomor' => 'D 5678 XYZ',
            'tahun_pembuatan' => 2019,
            'status_ketersediaan' => 'Tersedia',
            'status_kondisi' => 'Baik',
            'kapasitas_penumpang' => 7,
            'warna' => 'Putih',
            'jurusan_id' => $jurusan2->id,
            'tanggal_servis_terakhir' => '2025-02-15'
        ]);

        // Create Users
        \App\Models\User::create([
            'username' => 'Super Admin',
            'email' => 'admin@amkd.test',
            'password' => bcrypt('password'),
            'role' => 'super_admin',
            'jurusan_id' => $jurusan->id,
            'prodi_id' => $prodi1->id,
            'no_telepon' => '081234567890',
            'nik' => '1234567890123456',
            'status' => 'aktif',
            'alamat' => 'Alamat Super Admin'
        ]);

        \App\Models\User::create([
            'username' => 'Kepala Unit',
            'email' => 'kepala@amkd.test',
            'password' => bcrypt('password'),
            'role' => 'kepala_unit',
            'jurusan_id' => $jurusan->id,
            'prodi_id' => $prodi2->id,
            'no_telepon' => '081234567891',
            'nik' => '1234567890123457',
            'status' => 'aktif',
            'alamat' => 'Alamat Kepala Unit'
        ]);

        \App\Models\User::create([
            'username' => 'Pegawai',
            'email' => 'pegawai@amkd.test',
            'password' => bcrypt('password'),
            'role' => 'pegawai',
            'jurusan_id' => $jurusan2->id,
            'prodi_id' => null,
            'no_telepon' => '081234567892',
            'nik' => '1234567890123458',
            'status' => 'aktif',
            'alamat' => 'Alamat Pegawai'
        ]);
    }
}
