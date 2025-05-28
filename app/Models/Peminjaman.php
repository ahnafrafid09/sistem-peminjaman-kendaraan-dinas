<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mobil_id',
        'tanggal_peminjaman',
        'jam_peminjaman',
        'tanggal_pengembalian',
        'jam_pengembalian',
        'status',
        'kondisi_sebelum',
        'kondisi_sesudah',
        'alasan_peminjaman',
        'tujuan',
        'kepala_unit_id',
        'catatan_kepala_unit',
        'catatan_pengembalian',
        'lokasi_peminjaman'
    ];

    protected $casts = [
        'tanggal_peminjaman' => 'date',
        'tanggal_pengembalian' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function kepalaUnit()
    {
        return $this->belongsTo(User::class, 'kepala_unit_id');
    }

    public function lokasiPeminjaman()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_peminjaman');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }

    public function isPending()
    {
        return $this->status === 'Diproses';
    }

    public function isApproved()
    {
        return $this->status === 'Disetujui';
    }

    public function isRejected()
    {
        return $this->status === 'Ditolak';
    }

    public function isCompleted()
    {
        return $this->status === 'Selesai';
    }
}