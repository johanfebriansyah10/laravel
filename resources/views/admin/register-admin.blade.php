<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah Admin</h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.register.admin.store') }}" class="p-6 space-y-4">
        @csrf
        <input name="name" placeholder="Nama" required class="w-full p-2 border rounded" />
        <input name="email" placeholder="Email" required type="email" class="w-full p-2 border rounded" />
        <input name="no_hp" placeholder="No HP" class="w-full p-2 border rounded" />
        <input name="password" placeholder="Password" type="password" required class="w-full p-2 border rounded" />
        <input name="password_confirmation" placeholder="Konfirmasi Password" type="password" required class="w-full p-2 border rounded" />
        <button class="bg-blue-500 text-white p-2 rounded">Simpan</button>
    </form>
</x-app-layout>
