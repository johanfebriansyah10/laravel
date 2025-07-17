@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-6">
    <!-- Animated Header -->
    <div class="relative mb-8 overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-purple-600 to-purple-700 p-8 shadow-2xl">
        <!-- Floating Background Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute -top-4 -right-4 h-32 w-32 rounded-full bg-white animate-pulse"></div>
            <div class="absolute top-8 -left-8 h-24 w-24 rounded-full bg-emerald-300 animate-bounce"></div>
            <div class="absolute bottom-4 right-1/4 h-16 w-16 rounded-full bg-cyan-300 animate-pulse"></div>
            <div class="absolute top-1/2 left-1/4 h-12 w-12 rounded-full bg-yellow-300 animate-bounce"></div>
        </div>

        <div class="relative z-10 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white bg-opacity-20 rounded-full mb-4 animate-bounce">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2 animate-fadeIn">
                ✏️ Edit Data Mahasiswa
            </h1>
            <p class="text-blue-100 text-lg animate-slideUp">
                Perbarui informasi mahasiswa dengan data yang akurat
            </p>
        </div>
    </div>

    <!-- Progress Steps -->
    {{-- <div class="max-w-4xl mx-auto mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-600 text-white rounded-full font-bold animate-pulse">
                        ✓
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-green-600">Step 1</p>
                        <p class="text-xs text-gray-500">Data Akun</p>
                    </div>
                </div>
                <div class="flex-1 mx-4">
                    <div class="h-2 bg-green-200 rounded-full overflow-hidden">
                        <div class="h-full bg-green-600 rounded-full animate-pulse" style="width: 100%"></div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-600 text-white rounded-full font-bold animate-pulse">
                        ✓
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-green-600">Step 2</p>
                        <p class="text-xs text-gray-500">Data Pribadi</p>
                    </div>
                </div>
                <div class="flex-1 mx-4">
                    <div class="h-2 bg-green-200 rounded-full overflow-hidden">
                        <div class="h-full bg-green-600 rounded-full animate-pulse" style="width: 100%"></div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 bg-green-600 text-white rounded-full font-bold animate-pulse">
                        ✓
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-green-600">Step 3</p>
                        <p class="text-xs text-gray-500">Data Akademik</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Main Form Container -->
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-green-50 to-blue-50 p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            ✏️
                        </div>
                        <div class="ml-4">
                            <h2 class="text-2xl font-bold text-gray-800">Edit Formulir Mahasiswa</h2>
                            <p class="text-gray-600">Perbarui data yang diperlukan</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">NIM: {{ $mahasiswa->nim }}</p>
                        <p class="text-xs text-gray-400">Last Updated: {{ date('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" class="p-8" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Personal Information Section -->
                <div class="mb-10">
                    <div class="flex items-center mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                            1
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
                            <input type="text" name="nim" value="{{ $mahasiswa->nim }}"
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
                            <input type="text" name="nama" value="{{ $mahasiswa->nama }}"
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
                            <input type="text" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}"
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
                            <input type="date" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}"
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
                                <option value="Laki-laki" {{ $mahasiswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>👨 Laki-laki</option>
                                <option value="Perempuan" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>👩 Perempuan</option>
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
                            <input type="text" name="alamat" value="{{ $mahasiswa->alamat }}"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-300 group-hover:border-purple-300"
                                   placeholder="Alamat lengkap" required>
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

                <!-- Academic Information Section -->
                <div class="mb-10">
                    <div class="flex items-center mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                            2
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
                            <input type="text" name="prodi" value="{{ $mahasiswa->prodi }}"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 group-hover:border-green-300"
                                   placeholder="Contoh: Teknik Informatika" required>
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
                            <input type="text" name="angkatan" value="{{ $mahasiswa->angkatan }}" maxlength="4"
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-green-500 focus:ring-2 focus:ring-green-200 transition-all duration-300 group-hover:border-green-300 font-mono"
                                   placeholder="Contoh: 2024" required>
                        </div>
                    </div>
                </div>

                <!-- Status Change Information -->
                <div class="mb-10">
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-6 border-l-4 border-amber-400">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                ⚠️
                            </div>
                            <h3 class="ml-3 text-lg font-bold text-gray-800">Informasi Perubahan</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Dibuat: {{ $mahasiswa->created_at ? $mahasiswa->created_at->format('d M Y, H:i') : 'N/A' }}
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Terakhir diubah: {{ $mahasiswa->updated_at ? $mahasiswa->updated_at->format('d M Y, H:i') : 'N/A' }}
                            </div>
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

                    <div class="flex space-x-4">
                        <button type="reset"
                                class="group inline-flex items-center px-6 py-3 bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 transition-all duration-300 hover:shadow-lg hover:scale-105 font-semibold">
                            <svg class="w-5 h-5 mr-2 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset
                        </button>

                        <button type="submit"
                                class="group inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 hover:shadow-lg hover:scale-105 font-semibold">
                            <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Update Data
                            <div class="ml-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </button>
                    </div>
                </div>
            </form>
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

@keyframes slideIn {
    from { opacity: 0; transform: translateX(-30px); }
    to { opacity: 1; transform: translateX(0); }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}

.animate-slideUp {
    animation: slideUp 0.8s ease-out 0.2s both;
}

.animate-slideIn {
    animation: slideIn 0.5s ease-out;
}

/* Custom input focus animations */
.group:focus-within label {
    color: #3b82f6;
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

/* Enhanced hover effects */
.group:hover input,
.group:hover select {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Success indicator for filled fields */
.group input:valid:not(:placeholder-shown) {
    border-color: #10b981;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%2310b981'%3e%3cpath d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z'/%3e%3c/svg%3e");
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    background-repeat: no-repeat;
    padding-right: 2.5rem;
}

/* Form section animations */
.form-section {
    animation: slideIn 0.6s ease-out;
}

.form-section:nth-child(2) {
    animation-delay: 0.1s;
}

.form-section:nth-child(3) {
    animation-delay: 0.2s;
}

/* Enhanced button hover effects */
button:hover {
    transform: translateY(-2px);
}

/* Loading state styles */
.loading {
    position: relative;
    overflow: hidden;
}

.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Pulse animation for indicators */
@keyframes pulse-green {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
    }
    50% {
        box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
    }
}

.pulse-green {
    animation: pulse-green 2s infinite;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Tambahkan animasi ke setiap bagian form
    const sections = document.querySelectorAll('.mb-10');
    sections.forEach((section, index) => {
        section.classList.add('form-section');
        section.style.animationDelay = `${index * 0.1}s`;
    });

    // Validasi real-time dengan umpan balik visual
    const form = document.querySelector('form');
    if (!form) return; // Cegah error jika form tidak ditemukan

    const inputs = form.querySelectorAll('input, select');

    inputs.forEach(input => {
        input.addEventListener('input', function () {
            const group = this.closest('.group');

            if (this.validity.valid && this.value.trim() !== '') {
                this.classList.remove('border-red-500', 'ring-red-200', 'border-gray-200', 'ring-gray-200');
                this.classList.add('border-green-500', 'ring-green-200');

                // Animasi sukses
                if (group) {
                    group.classList.add('animate-pulse');
                    setTimeout(() => group.classList.remove('animate-pulse'), 600);
                }
            } else if (this.validity.valid) {
                this.classList.remove('border-red-500', 'ring-red-200', 'border-green-500', 'ring-green-200');
                this.classList.add('border-gray-200', 'ring-gray-200');
            } else {
                this.classList.remove('border-green-500', 'ring-green-200', 'border-gray-200', 'ring-gray-200');
                this.classList.add('border-red-500', 'ring-red-200');
            }
        });
    });
});
</script>
@endsection
