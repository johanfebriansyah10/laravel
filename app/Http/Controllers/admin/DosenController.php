<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::with('user')->get();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'nidn' => 'required|unique:dosen,nidn',
            'nama' => 'required',
            'gelar' => 'nullable',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dosen',
        ]);

        Dosen::create([
            'user_id' => $user->id,
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'gelar' => $request->gelar,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'foto' => $request->file('foto') ? $request->file('foto')->store('mahasiswa', 'public') : null,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn,' . $dosen->id,
            'nama' => 'required',
            'gelar' => 'nullable',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $dosen->update($request->only('nidn', 'nama', 'gelar', 'jenis_kelamin', 'alamat', 'no_hp',));
        if($request->hasFile('foto')) {
            $dosen->foto = $request->file('foto')->store('dosen', 'public');
            $dosen->save();
        }
        $dosen->user->update(['name' => $request->nama]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diupdate');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->user->delete(); // otomatis hapus dosen juga
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
    }
}

?>
