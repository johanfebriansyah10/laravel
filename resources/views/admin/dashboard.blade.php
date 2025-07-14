<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">
            Profile Admin
        </h2>
        <ul>
            <li><strong>Nama:</strong>{{ $admin->nama }}</li>
            <li><strong>NO Hp:</strong>{{ $admin->no_hp }}</li>
            <a href="{{ route('admin.register-user') }}">Register</a>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</x-app-layout>
