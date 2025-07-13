<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function dashboard() {
        $mahasiswa = \App\Models\Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('mahasiswa.dashboard', compact('mahasiswa'));
    }
}
