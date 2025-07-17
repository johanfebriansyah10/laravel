@extends('layouts.mahasiswa')

@section('mahasiswa.content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">
            Profile Dosen
        </h2>
        <ul>
            <li><strong>Nama:</strong>{{ $dosen->nama }}</li>
            <li><strong>NIDN:</strong>{{ $dosen->nidn }}</li>
            <li><strong>Jenis Kelamin:</strong>{{ $dosen->jenis_kelamin }}</li>
            <li><strong>Gelar:</strong>{{ $dosen->gelar }}</li>
            <li><strong>Email:</strong>{{ $dosen->email }}</li>
        </ul>
    </div>
@endsection
