@extends('layouts.app')
@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Buat Pengguna Baru</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-duration="800">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700"
                x-data="{
                    role: 'mahasiswa',
                    showPassword: false,
                    showConfirmPassword: false,
                    formData: {
                        name: '',
                        email: '',
                        password: '',
                        password_confirmation: '',
                        role: 'mahasiswa',
                        nidn: '',
                        nim: '',
                        prodi: '',
                        no_hp: ''
                    },
                    errors: {},
                    validateField(field) {
                        if (field === 'email') {
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            this.errors.email = !emailRegex.test(this.formData.email) ? 'Format email tidak valid' : '';
                        }
                        if (field === 'password_confirmation') {
                            his.errors.password_confirmation = this.formData.password !== this.formData.password_confirmation ? 'Password tidak cocok' : '';
                        }
                    }
                }">

                <!-- Header Section -->
                <div class="text-center mb-8" data-aos="fade-down" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Tambah Pengguna Baru</h3>
                    <p class="text-gray-600 dark:text-gray-400">Lengkapi formulir di bawah untuk membuat akun pengguna</p>
                </div>

                <form action="{{ route('admin.store-user') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Basic Info Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Nama -->
                        <div class="relative" data-aos="fade-right" data-aos-delay="300">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Nama Lengkap
                                </span>
                            </label>
                            <input type="text"
                                   name="name"
                                   x-model="formData.name"
                                   required
                                   class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 transform hover:scale-105 focus:scale-105 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                   placeholder="Masukkan nama lengkap" />
                            <div class="absolute inset-y-0 right-0 top-8 pr-3 flex items-center">
                                <div class="w-2 h-2 bg-green-500 rounded-full opacity-0 transition-opacity duration-300"
                                     x-show="formData.name.length > 0"
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"></div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="relative" data-aos="fade-left" data-aos-delay="400">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                    Email
                                </span>
                            </label>
                            <input type="email"
                                   name="email"
                                   x-model="formData.email"
                                   @input="validateField('email')"
                                   required
                                   class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 transform hover:scale-105 focus:scale-105 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                   placeholder="nama@email.com" />
                            <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-xs mt-1" x-transition></p>
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div class="relative" data-aos="fade-right" data-aos-delay="500">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    Password
                                </span>
                            </label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'"
                                       name="password"
                                       x-model="formData.password"
                                       required
                                       class="w-full px-4 py-3 pr-12 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 transform hover:scale-105 focus:scale-105 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                       placeholder="Masukkan password" />
                                <button type="button"
                                        @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-300">
                                    <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L12 12m-3.122-3.122l-.878-.878m3.122 3.122L9.878 9.878"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="relative" data-aos="fade-left" data-aos-delay="600">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Konfirmasi Password
                                </span>
                            </label>
                            <div class="relative">
                                <input :type="showConfirmPassword ? 'text' : 'password'"
                                       name="password_confirmation"
                                       x-model="formData.password_confirmation"
                                       @input="validateField('password_confirmation')"
                                       required
                                       class="w-full px-4 py-3 pr-12 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 transform hover:scale-105 focus:scale-105 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                       placeholder="Konfirmasi password" />
                                <button type="button"
                                        @click="showConfirmPassword = !showConfirmPassword"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-300">
                                    <svg x-show="!showConfirmPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    <svg x-show="showConfirmPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L12 12m-3.122-3.122l-.878-.878m3.122 3.122L9.878 9.878"></path>
                                    </svg>
                                </button>
                            </div>
                            <p x-show="errors.password_confirmation" x-text="errors.password_confirmation" class="text-red-500 text-xs mt-1" x-transition></p>
                        </div>
                    </div>

                    <!-- Role Selection -->
                    <div class="relative" data-aos="fade-up" data-aos-delay="700">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Role Pengguna
                            </span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="relative">
                                <input type="radio"
                                        name="role"
                                        value="admin"
                                        x-model="role"
                                        id="admin"
                                        class="sr-only peer">
                                <label for="admin"
                                        class="flex items-center justify-center p-4 bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 border-2 border-red-200 dark:border-red-700 rounded-xl cursor-pointer hover:from-red-100 hover:to-red-200 dark:hover:from-red-800/30 dark:hover:to-red-700/30 transition-all duration-300 transform hover:scale-105 peer-checked:from-red-500 peer-checked:to-red-600 peer-checked:text-white peer-checked:border-red-500">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 mx-auto mb-2 text-red-500 peer-checked:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        <span class="font-semibold text-white">Admin</span>
                                    </div>
                                </label>
                            </div>
                            <div class="relative">
                                <input type="radio"
                                        name="role"
                                        value="dosen"
                                        x-model="role"
                                        id="dosen"
                                        class="sr-only peer">
                                <label for="dosen"
                                        class="flex items-center justify-center p-4 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 border-2 border-green-200 dark:border-green-700 rounded-xl cursor-pointer hover:from-green-100 hover:to-green-200 dark:hover:from-green-800/30 dark:hover:to-green-700/30 transition-all duration-300 transform hover:scale-105 peer-checked:from-green-500 peer-checked:to-green-600 peer-checked:text-white peer-checked:border-green-500">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 mx-auto mb-2 text-green-500 peer-checked:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                        <span class="font-semibold text-white" >Dosen</span>
                                    </div>
                                </label>
                            </div>
                            <div class="relative">
                                <input type="radio"
                                        name="role"
                                        value="mahasiswa"
                                        x-model="role"
                                        id="mahasiswa"
                                        class="sr-only peer">
                                <label for="mahasiswa"
                                        class="flex items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 border-2 border-blue-200 dark:border-blue-700 rounded-xl cursor-pointer hover:from-blue-100 hover:to-blue-200 dark:hover:from-blue-800/30 dark:hover:to-blue-700/30 transition-all duration-300 transform hover:scale-105 peer-checked:from-blue-500 peer-checked:to-blue-600 peer-checked:text-white peer-checked:border-blue-500">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 mx-auto mb-2 text-blue-500 peer-checked:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                        </svg>
                                        <span class="font-semibold text-white">Mahasiswa</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Role-specific Fields -->
                    <!-- Dosen Fields -->
                    <div x-show="role === 'dosen'"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-4"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 -translate-y-4"
                        class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 p-6 rounded-xl border border-green-200 dark:border-green-700">
                        <h4 class="text-lg font-semibold text-green-800 dark:text-green-200 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Informasi Dosen
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-2">NIDN</label>
                                <input type="text"
                                        name="nidn"
                                        x-model="formData.nidn"
                                        class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-green-300 dark:border-green-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300 transform hover:scale-105 focus:scale-105 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                        placeholder="Masukkan NIDN" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-green-700 dark:text-green-300 mb-2">No HP</label>
                                <input type="text"
                                        name="no_hp"
                                        x-model="formData.no_hp"
                                        class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-green-300 dark:border-green-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300 transform hover:scale-105 focus:scale-105 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                        placeholder="Masukkan no HP" />
                            </div>
                        </div>
                    </div>

                    <!-- Mahasiswa Fields -->
                    <div x-show="role === 'mahasiswa'"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-4"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                        x-transition:leave-end="opacity-0 scale-95 -translate-y-4"
                        class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-6 rounded-xl border border-blue-200 dark:border-blue-700">
                        <h4 class="text-lg font-semibold text-blue-800 dark:text-blue-200 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                            Informasi Mahasiswa
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-blue-700 dark:text-blue-300 mb-2">NIM</label>
                                <input type="text"
                                        name="nim"
                                        x-model="formData.nim"
                                        class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-blue-300 dark:border-blue-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 transform hover:scale-105 focus:scale-105 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                        placeholder="Masukkan NIM" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-blue-700 dark:text-blue-300 mb-2">Program Studi</label>
                                <input type="text"
                                        name="prodi"
                                        x-model="formData.prodi"
                                        class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-blue-300 dark:border-blue-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 transform hover:scale-105 focus:scale-105 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                        placeholder="Masukkan program studi" />
                            </div>
                        </div>
                    </div>

                    <!-- Admin Fields -->
                    <div x-show="role === 'admin'"
                            x-transition:enter="transition ease-out duration-300">
                        <!-- You can add admin-specific fields here if needed -->
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
