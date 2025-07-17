<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dashboard() {
        $dosen = \App\Models\Dosen::where('user_id', Auth::user()->id)->first();
        return view('dosen.dashboard', compact('dosen'));

    }
}
