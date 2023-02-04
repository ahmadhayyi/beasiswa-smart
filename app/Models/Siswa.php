<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function smart()
    {
        return $this->hasMany(Smart::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
