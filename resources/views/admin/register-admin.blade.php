@extends('layouts.app')

@section('content') {{-- Pastikan section-nya sesuai layout --}}
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white tracking-wide">Tambah Admin</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Oops! Ada kesalahan:</strong>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="admin-form" method="POST" action="{{ route('admin.register.admin.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama" required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan Email" required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- No HP -->
            <div>
                <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" placeholder="Masukkan Nomor HP"
                    class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('no_hp') border-red-500 @enderror">
                @error('no_hp') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password" required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('password_confirmation') border-red-500 @enderror">
                @error('password_confirmation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Foto -->
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
                <input type="file" id="photo" name="photo" accept="image/*" class="hidden" onchange="previewFoto(this)">
                <label for="photo"
                    class="flex items-center justify-between w-full p-3 bg-white border-2 rounded-lg cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 ease-in-out {{ $errors->has('photo') ? 'border-red-500' : 'border-gray-300' }}">
                    <span id="photo-name" class="text-gray-500">Pilih file gambar</span>
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16V8m0 0l-4 4m4-4l4 4m6-4v8m0 0l4-4m-4 4l-4-4"></path>
                    </svg>
                </label>
                @error('photo') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror

                <div id="preview-container" class="mt-2 hidden">
                    <img id="preview-foto" class="h-32 rounded-lg shadow" alt="Preview Foto">
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="window.history.back()"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors duration-200">
                    Batal
                </button>
                <button type="button" onclick="confirmSubmit()"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <script>
        function confirmSubmit() {
            if (confirm('Apakah Anda yakin ingin menyimpan data admin?')) {
                document.getElementById('admin-form').submit();
            }
        }

        function previewFoto(input) {
            const file = input.files[0];
            const label = document.getElementById('photo-name');
            const preview = document.getElementById('preview-foto');
            const container = document.getElementById('preview-container');

            if (file) {
                label.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                label.textContent = "Pilih file gambar";
                preview.src = '';
                container.classList.add('hidden');
            }
        }
    </script>
@endsection
