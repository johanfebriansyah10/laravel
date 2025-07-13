<x-app-layout>
    <h1 class="text-2xl font-bold">Selamat Datang Admin</h1>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
        <button type="submit">Logout</button>
    </form>
</x-app-layout>