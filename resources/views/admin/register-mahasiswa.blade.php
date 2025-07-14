<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white tracking-wide">Tambah Mahasiswa</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg transform transition-all duration-300">
        <form id="mahasiswa-form" method="POST" action="{{ route('admin.register.mahasiswa.store') }}" class="space-y-6">
            @csrf
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input id="name" name="name" placeholder="Masukkan Nama" required
                       class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('name') border-red-500 @enderror" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIM Field -->
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                <input id="nim" name="nim" placeholder="Masukkan NIM" required
                       class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('nim') border-red-500 @enderror" />
                @error('nim')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tempat Lahir Field -->
            <div>
                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                <input id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required
                       class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('tempat_lahir') border-red-500 @enderror" />
                @error('tempat_lahir')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Lahir Field -->
            <div>
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input id="tanggal_lahir" type="date" name="tanggal_lahir" required
                       class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('tanggal_lahir') border-red-500 @enderror" />
                @error('tanggal_lahir')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jenis Kelamin Field -->
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required
                        class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('jenis_kelamin') border-red-500 @enderror">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Alamat Field -->
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <input id="alamat" name="alamat" placeholder="Masukkan Alamat" required
                       class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('alamat') border-red-500 @enderror" />
                @error('alamat')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Prodi Field -->
            <div>
                <label for="prodi" class="block text-sm font-medium text-gray-700">Program Studi</label>
                <input id="prodi" name="prodi" placeholder="Masukkan Program Studi" required
                       class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('prodi') border-red-500 @enderror" />
                @error('prodi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Angkatan Field -->
            <div>
                <label for="angkatan" class="block text-sm font-medium text-gray-700">Angkatan</label>
                <input id="angkatan" name="angkatan" placeholder="Masukkan Angkatan" required
                       class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('angkatan') border-red-500 @enderror" />
                @error('angkatan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" placeholder="Masukkan Email" required
                       class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('email') border-red-500 @enderror" />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- foto field --}}
            <div>
        <input
            type="file"
            id="foto"
            name="foto"
            accept="image/*"
            class="hidden"
        >
        <label
            for="foto"
            class="flex items-center justify-between w-full p-3 bg-white border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 ease-in-out focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 @error('foto') border-red-500 @enderror"
        >
            <span class="text-gray-500">Pilih file gambar</span>
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V8m0 0l-4 4m4-4l4 4m6-4v8m0 0l4-4m-4 4l-4-4"></path>
            </svg>
        </label>
        @error('foto')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" placeholder="Masukkan Password" required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('password') border-red-500 @enderror" />
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Confirmation Field -->
            <div>
                <label for="password_confirmation" class="block Text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Konfirmasi Password" required
                    class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('password_confirmation') border-red-500 @enderror" />
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
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

    <!-- JavaScript for Form Submission Confirmation -->
    <script>
        function confirmSubmit() {
            if (confirm('Apakah Anda yakin ingin menyimpan data mahasiswa?')) {
                document.getElementById('mahasiswa-form').submit();
            }
        }
    </script>
</x-app-layout>
