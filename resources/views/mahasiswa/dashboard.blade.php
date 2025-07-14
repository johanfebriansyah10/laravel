<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">
            Profile Mahasiswa
        </h2>
        <ul>
            <li><strong>Nama:</strong>{{ $mahasiswa->nama }}</li>
            <li><strong>NIM:</strong>{{ $mahasiswa->nim }}</li>
            <li><strong>Tempat/Tgl Lahir:</strong>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</li>
            <li><strong>Prodi:</strong>{{ $mahasiswa->prodi }}</li>
            <li><strong>Angkatan:</strong>{{ $mahasiswa->angkatan }}</li>
        </ul>
    </div>
</x-app-layout>