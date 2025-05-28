<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = ['lokasi'];

    public function mobil()
    {
        return $this->hasMany(Mobil::class, 'lokasi_awal');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'lokasi_peminjaman');
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'lokasi_pengembalian');
    }
}