<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminjaman_id',
        'tanggal_pengembalian',
        'lokasi_pengembalian',
        'kondisi_sesudah'
    ];

    protected $casts = [
        'tanggal_pengembalian' => 'date',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    public function lokasiPengembalian()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_pengembalian');
    }
}