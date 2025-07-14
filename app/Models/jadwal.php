<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = [
        'matakuliah_id',
        'dosen_id',
        'ruangan',
        'hari',
        'jam_mulai',
        'selesai',
        'kelas',
        'tahun_ajaran',
        'semester'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
