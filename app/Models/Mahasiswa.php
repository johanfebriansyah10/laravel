<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'user_d',
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'prodi',
        'angkatan'];

        public function user(){
            return $this->belongsTo(User::class);
        }

        public function krs(){
            return $this->hasMany(krs::class);
        }
}
