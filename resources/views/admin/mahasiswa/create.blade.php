@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-6">
    <!-- Animated Header -->
    <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 p-8 shadow-2xl">
        <!-- Floating Background Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute -top-4 -right-4 h-32 w-32 rounded-full bg-white animate-pulse"></div>
            <div class="absolute top-8 -left-8 h-24 w-24 rounded-full bg-cyan-300 animate-bounce"></div>
            <div class="absolute bottom-4 right-1/4 h-16 w-16 rounded-full bg-pink-300 animate-pulse"></div>
            <div class="absolute top-1/2 left-1/4 h-12 w-12 rounded-full bg-yellow-300 animate-bounce"></div>
        </div>

        <div class="relative z-10 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white bg-opacity-20 rounded-full mb-4 animate-bounce">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2 animate-fadeIn">
                ✨ Tambah Mahasiswa Baru
            </h1>
            <p class="text-blue-100 text-lg animate-slideUp">
                Lengkapi formulir di bawah dengan data yang akurat
            </p>
        </div>
    </div>

    <!-- Progress Steps -->
    {{-- <div class="max-w-4xl mx-auto mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full font-bold animate-pulse">
                        1
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-blue-600">Step 1</p>
                        <p class="text-xs text-gray-500">Data Akun</p>
                    </div>
                </div>
                <div class="flex-1 mx-4">
                    <div class="h-2 bg-blue-200 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-600 rounded-full animate-pulse" style="width: 33%"></div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 bg-gray-300 text-gray-500 rounded-full font-bold">
                        2
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Step 2</p>
                        <p class="text-xs text-gray-400">Data Pribadi</p>
                    </div>
                </div>
                <div class="flex-1 mx-4">
                    <div class="h-2 bg-gray-200 rounded-full"></div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 bg-gray-300 text-gray-500 rounded-full font-bold">
                        3
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Step 3</p>
                        <p class="text-xs text-gray-400">Data Akademik</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Main Form Container -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-gray-50 to-blue-50 p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            📝
                        </div>
                        <div class="ml-4">
                            <h2 class="text-2xl font-bold text-gray-800">Formulir Pendaftaran</h2>
                            <p class="text-gray-600">Isi semua field yang diperlukan</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Form ID: #{{ date('YmdHis') }}</p>
                        <p class="text-xs text-gray-400">{{ date('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('mahasiswa.store') }}" method="POST" class="p-8" enctype="multipart/form-data">
                @csrf

                <!-- Account Information Section -->
                <div class="mb-10">
                    <div class="flex items-center mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                            1
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">Informasi Akun</h3>
                        <div class="ml-3 flex-1 h-px bg-gradient-to-r from-blue-200 to-transparent"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Nama User
                                </span>
                            </label>
                            <input type="text" name="name"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 group-hover:border-blue-300"
                                   placeholder="Masukkan nama user" required>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                    Email
                                </span>
                            </label>
                            <input type="email" name="email"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 group-hover:border-blue-300"
                                   placeholder="contoh@email.com" required>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    Password
                                </span>
                            </label>
                            <input type="password" name="password"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 group-hover:border-blue-300"
                                   placeholder="Minimal 8 karakter" required>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Konfirmasi Password
                                </span>
                            </label>
                            <input type="password" name="password_confirmation"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 group-hover:border-blue-300"
                                   placeholder="Ulangi password" required>
                        </div>
                    </div>
                </div>

                <!-- Personal Information Section -->
                <div class="mb-10">
                    <div class="flex items-center mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                            2
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">Informasi Pribadi</h3>
                        <div class="ml-3 flex-1 h-px bg-gradient-to-r from-purple-200 to-transparent"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V4a2 2 0 118 0v2m-4 0a2 2 0 104 0m-4 0a2 2 0 014 0z"></path>
                                    </svg>
                                    NIM
                                </span>
                            </label>
                            <input type="text" name="nim"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 group-hover:border-purple-300 font-mono"
                                   placeholder="Contoh: 2024001001" required>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Nama Lengkap
                                </span>
                            </label>
                            <input type="text" name="nama"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 group-hover:border-purple-300"
                                   placeholder="Nama lengkap sesuai KTP" required>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Tempat Lahir
                                </span>
                            </label>
                            <input type="text" name="tempat_lahir"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 group-hover:border-purple-300"
                                   placeholder="Kota tempat lahir" required>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Tanggal Lahir
                                </span>
                            </label>
                            <input type="date" name="tanggal_lahir"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 group-hover:border-purple-300" required>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Jenis Kelamin
                                </span>
                            </label>
                            <select name="jenis_kelamin"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 group-hover:border-purple-300" required>
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki">👨 Laki-laki</option>
                                <option value="Perempuan">👩 Perempuan</option>
                            </select>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    Alamat
                                </span>
                            </label>
                            <input type="text" name="alamat"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 group-hover:border-purple-300"
                                   placeholder="Alamat lengkap" required>
                        </div>
                    </div>
                </div>

                <!-- Academic Information Section -->
                <div class="mb-10">
                    <div class="flex items-center mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                            3
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">Informasi Akademik</h3>
                        <div class="ml-3 flex-1 h-px bg-gradient-to-r from-green-200 to-transparent"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    </svg>
                                    Program Studi
                                </span>
                            </label>
                            <select name="prodi"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 group-hover:border-green-300"
                                    required>
                                <option value="">Pilih Program Studi</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                <option value="Rek, Sistem Informasi">Rek, Sistem Informasi</option>
                                <option value="Rek, Perangkat Lunak">Rek, Perangkat Lunak</option>
                                <option value="Manajemen">Manajemen</option>
                                <option value="Hukum">Hukum</option>
                                <option value="Teknik Komputer">Teknik Komputer</option>
                                <option value="Sekretari">Sekretari</option>
                                <option value="Manajemen Informasi">Manajemen Informasi</option>
                                <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                                <option value="Manajemen Administrasi">Manajemen Administrasi</option>
                            </select>
                        </div>


                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Angkatan
                                </span>
                            </label>
                            <input type="text" name="angkatan" maxlength="4"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 group-hover:border-green-300 font-mono"
                                   placeholder="Contoh: 2024" required>
                        </div>

                        <div class="group mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 7h2l2-2h10l2 2h2v12H3V7zm9 4a3 3 0 100 6 3 3 0 000-6z"/>
                                    </svg>
                                    Upload Foto
                                </span>
                            </label>
                            <input type="file" name="foto"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 bg-white/50 backdrop-blur-sm shadow-sm
                                focus:border-purple-500 focus:ring-4 focus:ring-purple-200/50 hover:border-purple-300
                                transition-all duration-300 ease-in-out cursor-pointer file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0 file:bg-purple-50 file:text-purple-700
                                file:font-medium file:hover:bg-purple-100 file:transition-colors"
                                accept="image/*" required>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('mahasiswa.index') }}"
                       class="group inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>

                    <button type="submit"
                            class="group inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 hover:shadow-lg hover:scale-105 font-semibold">
                        <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Data
                        <div class="ml-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Toast Template (Hidden by default) -->
    {{-- <div id="success-toast" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Data berhasil disimpan!
        </div>
    </div> --}}
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

/* Custom input focus animations */
.group:focus-within label {
    color: #3b82f6;
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

/* Floating label effect */
.group input:focus + label,
.group input:not(:placeholder-shown) + label {
    transform: translateY(-1.5rem) scale(0.85);
    color: #3b82f6;
}

/* Progress bar animation */
@keyframes progress {
    from { width: 0%; }
    to { width: 33%; }
}

.progress-bar {
    animation: progress 1s ease-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Real-time validation
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, select');

    inputs.forEach(input => {
        input.addEventListener('input', function () {
            if (this.validity.valid) {
                this.classList.remove('border-red-500', 'ring-red-200');
                this.classList.add('border-green-500', 'ring-green-200');
            } else {
                this.classList.remove('border-green-500', 'ring-green-200');
                this.classList.add('border-red-500', 'ring-red-200');
            }
        });
    });

    // Password confirmation validation
    const password = form.querySelector('input[name="password"]');
    const passwordConfirmation = form.querySelector('input[name="password_confirmation"]');

    function validatePassword() {
        if (password.value !== passwordConfirmation.value) {
            passwordConfirmation.setCustomValidity('Password tidak cocok');
        } else {
            passwordConfirmation.setCustomValidity('');
        }
    }

    if (password && passwordConfirmation) {
        password.addEventListener('input', validatePassword);
        passwordConfirmation.addEventListener('input', validatePassword);
    }

    // Form submission with loading state
    form.addEventListener('submit', function (e) {
        const submitButton = this.querySelector('button[type="submit"]');
        const originalText = submitButton.innerHTML;

        // Optional: prevent double submission
        submitButton.disabled = true;

        // Show loading spinner
        submitButton.innerHTML = `
            <svg class="animate-spin w-5 h-5 mr-2 inline" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2
                       5.291A7.962 7.962 0 014 12H0c0 3.042
                       1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Menyimpan...
        `;

        // Allow normal submission if needed
        // e.preventDefault(); // Uncomment this if you're doing AJAX submission
    });
});
</script>

@endsection
