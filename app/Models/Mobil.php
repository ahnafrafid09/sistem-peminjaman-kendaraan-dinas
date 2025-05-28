<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merek_mobil_id',
        'lokasi_awal',
        'plat_nomor',
        'tahun_pembuatan',
        'status_ketersediaan',
        'status_kondisi',
        'kapasitas_penumpang',
        'warna',
        'jurusan_id',
        'tanggal_servis_terakhir'
    ];

    protected $casts = [
        'tanggal_servis_terakhir' => 'date'
    ];

    public function merek()
    {
        return $this->belongsTo(MerekMobil::class, 'merek_mobil_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_awal');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function isAvailable()
    {
        return $this->status_ketersediaan === 'Tersedia';
    }

    public function isInService()
    {
        return $this->status_ketersediaan === 'Dalam Perbaikan';
    }

    public function isRented()
    {
        return $this->status_ketersediaan === 'Dipinjam';
    }
}