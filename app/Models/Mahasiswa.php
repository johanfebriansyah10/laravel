<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'user_id',
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'prodi',
        'angkatan',
        'foto',];
        public function user(){
            return $this->belongsTo(User::class);
        }

        public function krs(){
            return $this->hasMany(krs::class);
        }
}
