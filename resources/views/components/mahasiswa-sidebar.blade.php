<aside
    class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100 w-72 h-screen fixed top-0 left-0 shadow-xl z-50 transition-transform duration-300 transform lg:translate-x-0 -translate-x-full lg:static lg:block"
    x-data="{ open: false, menus: { register: false } }"
    x-show="open || window.innerWidth >= 1024"
    x-transition
>


    <!-- Navigation -->
    <nav class="flex flex-col mt-6 space-y-2 text-sm font-medium px-4">
        <!-- Beranda -->
        <a
            href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-800 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200 group"
        >
            <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            Beranda
        </a>

        <!-- Register Collapsible Menu -->


        <!-- KHS -->
        <a
            href=""
            class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-800 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200 group"
        >
            <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            KHS
        </a>

        <!-- KRS -->
        <a
            href=""
            class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-800 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200 group"
        >
            <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332 2.477 4.5 3.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            KRS
        </a>

        <!-- PROFILE -->
        <a
            href="{{ route('profile.edit') }}"
            class="flex items-center px-4 py-3 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-800 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-200 group"
        >
            <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Profile
        </a>

    </nav>
</aside>
