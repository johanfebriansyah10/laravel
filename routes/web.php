<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', function(){
        $user = \Illuminate\Support\Facades\Auth::user();
        return match($user->role){
            'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
            'dosen' => redirect()->route('dosen.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            default => abort(403)
        };
    })->name('dashboard');
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::prefix('dosen')->middleware(['auth', 'role:dosen'])->group(function (){
    Route::get('/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
});

Route::prefix('mahasiswa')->middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
});



require __DIR__.'/auth.php';
