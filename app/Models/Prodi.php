<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = ['jurusan_id', 'nama_prodi'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}