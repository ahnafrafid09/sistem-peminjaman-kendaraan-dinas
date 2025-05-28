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
        // Jurusan
        $jurusan = [
            ['nama_jurusan' => 'Teknik Informatika'],
            ['nama_jurusan' => 'Teknik Mesin'],
            ['nama_jurusan' => 'Teknik Elektro'],
            ['nama_jurusan' => 'Manajemen'],
            ['nama_jurusan' => 'Akuntansi'],
        ];
        Jurusan::insert($jurusan);

        // Prodi
        $prodi = [
            ['jurusan_id' => 1, 'nama_prodi' => 'Animasi'],
            ['jurusan_id' => 1, 'nama_prodi' => 'Teknik Informatika'],
            ['jurusan_id' => 2, 'nama_prodi' => 'Teknik Mesin'],
            ['jurusan_id' => 3, 'nama_prodi' => 'Teknik Elektro'],
            ['jurusan_id' => 4, 'nama_prodi' => 'Manajemen Bisnis'],
        ];
        Prodi::insert($prodi);

        // Merek Mobil
        $merek = [
            ['nama' => 'Toyota'],
            ['nama' => 'Honda'],
            ['nama' => 'Suzuki'],
            ['nama' => 'Daihatsu'],
            ['nama' => 'Mitsubishi'],
        ];
        MerekMobil::insert($merek);

        // Lokasi
        $lokasi = [
            ['lokasi' => 'Garasi Kampus A'],
            ['lokasi' => 'Garasi Kampus B'],
            ['lokasi' => 'Parkiran Dosen'],
            ['lokasi' => 'Parkiran Mahasiswa'],
            ['lokasi' => 'Bengkel Kampus'],
        ];
        Lokasi::insert($lokasi);

        // Mobil
        $mobil = [
            [
                'merek_mobil_id' => 1,
                'lokasi_awal' => 1,
                'plat_nomor' => 'B 1234 ABC',
                'tahun_pembuatan' => 2020,
                'status_ketersediaan' => 'Tersedia',
                'status_kondisi' => 'Baik',
                'kapasitas_penumpang' => 5,
                'warna' => 'Hitam',
                'jurusan_id' => 1,
                'tanggal_servis_terakhir' => '2025-01-10',
            ],
            // Add other mobil data...
        ];
        Mobil::insert($mobil);

        // Users
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@polibatam.ac.id',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'jurusan_id' => 1,
            'prodi_id' => 1,
            'no_telepon' => '081234567890',
            'nik' => '1234567890123456',
            'alamat' => 'Politeknik Negeri Batam',
        ]);

        User::create([
            'nama' => 'Kepala Unit TI',
            'email' => 'kepalati@polibatam.ac.id',
            'password' => Hash::make('password'),
            'role' => 'kepala_unit',
            'jurusan_id' => 1,
            'prodi_id' => 2,
            'no_telepon' => '081234567891',
            'nik' => '1234567890123457',
            'alamat' => 'Politeknik Negeri Batam',
        ]);

        User::create([
            'nama' => 'Dosen TI',
            'email' => 'dosen@polibatam.ac.id',
            'password' => Hash::make('password'),
            'role' => 'pegawai',
            'jurusan_id' => 1,
            'prodi_id' => 2,
            'no_telepon' => '081234567892',
            'nik' => '1234567890123458',
            'alamat' => 'Politeknik Negeri Batam',
        ]);
    }
}