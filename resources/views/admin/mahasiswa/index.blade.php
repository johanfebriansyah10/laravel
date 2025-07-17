@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-cyan-50 p-6">
    <!-- Header Section with Animated Background -->
    <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 p-8 shadow-2xl">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute -top-4 -right-4 h-24 w-24 rounded-full bg-white animate-pulse"></div>
            <div class="absolute top-8 -left-8 h-16 w-16 rounded-full bg-cyan-300 animate-bounce"></div>
            <div class="absolute bottom-4 right-1/3 h-12 w-12 rounded-full bg-pink-300 animate-pulse"></div>
        </div>

        <div class="relative z-10 flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-white mb-2 animate-fadeIn">
                    📚 Data Mahasiswa
                </h1>
                <p class="text-blue-100 text-lg animate-slideUp">
                    Kelola data mahasiswa dengan mudah dan efisien
                </p>
            </div>

            <!-- Add Student Button with Glow Effect -->
            <a href="{{ route('mahasiswa.create') }}"
               class="group relative px-8 py-4 bg-white text-blue-600 rounded-2xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 hover:bg-gradient-to-r hover:from-cyan-50 hover:to-blue-50">
                <span class="flex items-center gap-2">
                    <svg class="w-5 h-5 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Mahasiswa
                </span>
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
            </a>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="mb-6 bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex flex-col md:flex-row gap-4 items-center">
            <div class="relative flex-1">
                <input type="text"
                       placeholder="🔍 Cari berdasarkan NIM, nama, atau prodi..."
                       class="w-full px-4 py-3 pl-12 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none transition-colors duration-300">
                <svg class="absolute left-4 top-4 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <select class="px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none transition-colors duration-300">
                <option>Semua Prodi</option>
                <option>Teknik Informatika</option>
                <option>Sistem Informasi</option>
                <option>Teknik Komputer</option>
            </select>
            <select class="px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none transition-colors duration-300">
                <option>Semua Angkatan</option>
                <option>2024</option>
                <option>2023</option>
                <option>2022</option>
                <option>2021</option>
            </select>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm">Total Mahasiswa</p>
                    <p class="text-3xl font-bold">{{ count($mahasiswa) }}</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm">Aktif</p>
                    <p class="text-3xl font-bold">{{ count($mahasiswa) }}</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm">Prodi Terbanyak</p>
                    <p class="text-xl font-bold">Teknik Informatika</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm">Angkatan Terbaru</p>
                    <p class="text-3xl font-bold">2024</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Table with Glass Effect -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 backdrop-blur-sm">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-800">Daftar Mahasiswa</h3>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span>Menampilkan {{ count($mahasiswa) }} data</span>
                    <div class="flex gap-1">
                        <button class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </button>
                        <button class="p-2 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                        <th class="text-left p-4 font-semibold text-gray-700 hover:bg-blue-100 transition-colors cursor-pointer">
                            <div class="flex items-center gap-2">
                                📋 NIM
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th class="text-left p-4 font-semibold text-gray-700 hover:bg-blue-100 transition-colors cursor-pointer">
                            <div class="flex items-center gap-2">
                                👤 Nama
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th class="text-left p-4 font-semibold text-gray-700 hover:bg-blue-100 transition-colors cursor-pointer">
                            <div class="flex items-center gap-2">
                                🎓 Prodi
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th class="text-left p-4 font-semibold text-gray-700 hover:bg-blue-100 transition-colors cursor-pointer">
                            <div class="flex items-center gap-2">
                                📅 Angkatan
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th class="text-left p-4 font-semibold text-gray-700 hover:bg-blue-100 transition-colors cursor-pointer">
                            <div class="flex items-center gap-2">
                                📷 Foto
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                                </svg>
                            </div>
                        </th>
                        <th class="text-left p-4 font-semibold text-gray-700">
                            ⚡ Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($mahasiswa as $index => $mhs)
                        <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 group">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                        {{ $index + 1 }}
                                    </div>
                                    <span class="font-mono text-sm bg-gray-100 px-3 py-1 rounded-full">{{ $mhs->nim }}</span>
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="font-medium text-gray-900">{{ $mhs->nama }}</div>
                                <div class="text-sm text-gray-500">Mahasiswa Aktif</div>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-green-100 to-blue-100 text-green-800">
                                    {{ $mhs->prodi }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-orange-100 to-red-100 text-orange-800">
                                    {{ $mhs->angkatan }}
                                </span>
                            </td>
                            <td class="p-4">
                                <img src="{{ asset('storage/' . $mhs->foto) }}" alt="Foto Mahasiswa" class="w-14 h-14 rounded-full object-cover">
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('mahasiswa.edit', $mhs) }}"
                                       class="group/edit inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover:shadow-lg hover:scale-105">
                                        <svg class="w-4 h-4 mr-1 transition-transform group-hover/edit:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('mahasiswa.destroy', $mhs) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')"
                                                class="group/delete inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 hover:shadow-lg hover:scale-105">
                                            <svg class="w-4 h-4 mr-1 transition-transform group-hover/delete:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="bg-gray-50 p-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">{{ count($mahasiswa) }}</span> dari <span class="font-medium">{{ count($mahasiswa) }}</span> hasil
                </div>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-sm hover:bg-gray-50 transition-colors">
                        Sebelumnya
                    </button>
                    <button class="px-3 py-1 rounded-md bg-blue-600 text-white text-sm hover:bg-blue-700 transition-colors">
                        1
                    </button>
                    <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-sm hover:bg-gray-50 transition-colors">
                        Selanjutnya
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}

.animate-slideUp {
    animation: slideUp 0.8s ease-out 0.2s both;
}
</style>
@endsection
