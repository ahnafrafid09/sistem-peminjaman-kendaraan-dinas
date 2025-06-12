<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';

    protected $fillable = [
        'peminjaman_id',
        'catatan_pengembalian',
        'lokasi_id',
        'status',
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