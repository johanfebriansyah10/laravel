<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $admin = \App\Models\Admin::where('user_id', Auth::user()->id)->first();
        return view('admin.dashboard', compact('admin'));
    }

    public function createUser()
    {
        return view('admin.register-user'); // SESUAI DENGAN FOLDER & FILE YANG KITA BUAT
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', 'min:6'],
            'role' => ['required', 'in:admin,dosen,mahasiswa'],
            'nim' => ['nullable', 'required_if:role,mahasiswa', 'unique:mahasiswa,nim'],
            'nidn' => ['nullable', 'required_if:role,dosen', 'unique:dosen,nidn'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if($request->role === 'mahasiswa'){
            Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => strtoupper($request->nim),
                'nama' => $request->name,
                'prodi' => $request->prodi ?? '',
                'tempat_lahir' => '-',
                'tanggal_lahir' => now(),
                'jenis_kelamin' => '-',
                'alamat' => '-',
                'angkatan' => '2020',
            ]);
        }elseif ($request->role === 'dosen') {
        Dosen::create([
            'user_id' => $user->id,
            'nidn' => strtoupper($request->nidn),
            'nama' => $user->name,
            'jenis_kelamin' => '-',
            'email' => $user->email,
            'alamat' => '-',
            'gelar' => '-',
            'no_hp' => $request->no_hp ?? null,
        ]);
    } elseif ($request->role === 'admin') {
        Admin::create([
            'user_id' => $user->id,
            'nama' => $user->name,
            'no_hp' => $request->no_hp ?? null,
        ]);
    }
    return redirect()->route('admin.dashboard')->with('success', "User Berhasil dibuat");
    }

    // ADMIN
public function showAdminForm() {
    return view('admin.register-admin');
}

public function storeAdmin(Request $request) {
    $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
        'no_hp' => 'nullable|string|max:13',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'admin',
    ]);

    Admin::create([
        'user_id' => $user->id,
        'nama' => $user->name,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Admin berhasil dibuat');
}

// DOSEN
public function showDosenForm() {
    return view('admin.register-dosen');
}

public function storeDosen(Request $request) {
    $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
        'nidn' => 'required|unique:dosen,nidn',
        'gelar' => 'nullable|string|max:50',
        'jenis_kelamin' => 'required',
        'alamat' => 'nullable|string|max:70',
        'no_hp' => 'nullable|string|max:20',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'dosen',
    ]);

    Dosen::create([
        'user_id' => $user->id,
        'nidn' => $request->nidn,
        'nama' => $user->name,
        'gelar' => $request->gelar,
        'jenis_kelamin' => $request->jenis_kelamin,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Dosen berhasil dibuat');
}

// MAHASISWA
public function showMahasiswaForm() {
    return view('admin.register-mahasiswa');
}

public function storeMahasiswa(Request $request) {
    $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
        'nim' => 'required|unique:mahasiswa,nim|max:7',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'alamat' => 'required|max:100',
        'prodi' => 'required|max:30',
        'angkatan' => 'required|max:4',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'mahasiswa',
    ]);

    Mahasiswa::create([
        'user_id' => $user->id,
        'nim' => $request->nim,
        'nama' => $user->name,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'prodi' => $request->prodi,
        'angkatan' => $request->angkatan,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Mahasiswa berhasil dibuat');
}

}
