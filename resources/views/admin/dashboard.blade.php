@extends('layouts.app')

@section('register')
    <div class="max-w-4xl mx-auto mt-12 bg-white p-8 rounded-2xl shadow-xl transition-all duration-300">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-extrabold text-gray-800">Profile Admin</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-500">Welcome, {{ $admin->nama }}</span>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-inner mb-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Informasi Profil</h3>
            <ul class="space-y-3 text-gray-600">
                <li class="flex items-center">
                    <span class="w-24 font-medium">Nama:</span>
                    <span class="text-gray-800">{{ $admin->nama }}</span>
                </li>
                <li class="flex items-center">
                    <span class="w-24 font-medium">No HP:</span>
                    <span class="text-gray-800">{{ $admin->no_hp }}</span>
                </li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <a href="{{ route('admin.register-user') }}"
               class="block text-center bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200">
                Register User
            </a>
            <a href="{{ route('admin.register.admin') }}"
               class="block text-center bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors duration-200">
                Tambah Admin
            </a>
            <a href="{{ route('admin.register.dosen') }}"
               class="block text-center bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors duration-200">
                Tambah Dosen
            </a>
            <a href="{{ route('admin.register.mahasiswa') }}"
               class="block text-center bg-purple-600 text-white py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors duration-200">
                Tambah Mahasiswa
            </a>
        </div>

        <!-- Logout Form -->
        <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="button"
                    onclick="confirmLogout()"
                    class="w-full bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-700 transition-colors duration-200">
                Logout
            </button>
        </form>
    </div>

    <!-- JavaScript for Logout Confirmation -->
    <script>
        function confirmLogout() {
            if (confirm('Are you sure you want to log out?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
@endsection
