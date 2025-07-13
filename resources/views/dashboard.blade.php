<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div data-aos="fade-up">Konten animasi muncul</div>
        <div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-md mt-10 animate-fade-in">
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-600 dark:text-blue-300">
                Selamat Data {{ Auth::user()->name }}!
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-4 bg-blue-100 dark:bg-blue-900 rounded-xl showdow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Profile</h2>
                    <p class="text-gray-700 dark:text-gray-300">Lihat data akun anda</p>
                </div>
                <div class="p-4 bg-blue-100 dark:bg-blue-900 rounded-xl showdow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Navigasi</h2>
                    <p class="text-gray-700 dark:text-gray-300">Menu menuju fitur utama</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
