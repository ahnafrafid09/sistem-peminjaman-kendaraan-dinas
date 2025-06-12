<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'jurusan_id',
        'prodi_id',
        'no_telepon',
        'status',
        'nik',
        'alamat',
        'foto_profil'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function approvals()
    {
        return $this->hasMany(Peminjaman::class, 'kepala_unit_id');
    }

    public function isAdmin()
    {
        return $this->role === 'subbag';
    }

    public function isKepalaUnit()
    {
        return $this->role === 'kepala_unit';
    }

    public function isPegawai()
    {
        return $this->role === 'pegawai';
    }
    public function receivesBroadcastNotificationsOn()
    {
        return 'notifikasi.' . $this->id;
    }
}