<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $admin = \App\Models\Admin::where('user_id', Auth::user()->id)->first();
        return view('admin.dashboard', compact('admin'));
    }
}
