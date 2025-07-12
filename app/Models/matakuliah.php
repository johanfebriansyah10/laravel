<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'sks',
        'dosen_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
