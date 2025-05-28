<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jurusan'];

    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function mobil()
    {
        return $this->hasMany(Mobil::class);
    }
}