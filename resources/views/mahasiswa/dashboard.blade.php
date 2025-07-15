@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-xl shadow-2xl">
    <div class="flex flex-col items-center">
        <div class="mb-4">
            @if($mahasiswa->foto)
                <img src="{{ asset('storage/' . $mahasiswa->foto) }}" class="w-36 h-36 rounded-full border-4 border-blue-400 shadow-lg object-cover" alt="Foto Mahasiswa">
            @else
                <div class="w-36 h-36 flex items-center justify-center rounded-full bg-blue-200 text-blue-600 font-bold text-xl border-4 border-blue-400 shadow-lg">
                    Tidak ada foto
                </div>
            @endif
        </div>
        <h2 class="text-3xl font-extrabold text-blue-700 mb-2 tracking-wide">
            {{ $mahasiswa->nama }}
        </h2>
        <span class="text-lg text-gray-600 mb-6">Mahasiswa {{ $mahasiswa->prodi }}</span>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <ul class="space-y-4">
            <li>
                <span class="font-semibold text-blue-600">NIM:</span>
                <span class="ml-2 text-gray-800">{{ $mahasiswa->nim }}</span>
            </li>
            <li>
                <span class="font-semibold text-blue-600">Tempat/Tgl Lahir:</span>
                <span class="ml-2 text-gray-800">{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</span>
            </li>
            <li>
                <span class="font-semibold text-blue-600">Prodi:</span>
                <span class="ml-2 text-gray-800">{{ $mahasiswa->prodi }}</span>
            </li>
            <li>
                <span class="font-semibold text-blue-600">Angkatan:</span>
                <span class="ml-2 text-gray-800">{{ $mahasiswa->angkatan }}</span>
            </li>
        </ul>
    </div>
</div>
@endsection
