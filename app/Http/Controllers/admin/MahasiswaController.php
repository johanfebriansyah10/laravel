<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('user')->get();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required|digits:4',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'prodi' => $request->prodi,
            'angkatan' => $request->angkatan,
            'foto' => $request->file('foto') ? $request->file('foto')->store('mahasiswa', 'public') : null,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required|digits:4',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('email', 'foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }

        $mahasiswa->update($data);
        $mahasiswa->user->update(['name' => $request->nama]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->user->delete(); // Cascade delete
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }
}
