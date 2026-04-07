@props(['school', 'isLogin'])

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

<nav class="bg-white border-gray-200 dark:bg-gray-900 fixed w-full z-50 top-0 left-0">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto px-4 py-3">

        <!-- LOGO -->
        <a href="/" class="flex items-center gap-3">
            <img src="{{ asset(($school?->logo) ? 'storage/' . $school->logo : 'logo-almadani.png') }}"
                class="h-8 sm:h-10" alt="School Logo" />
            <span class="text-lg sm:text-2xl font-bold dark:text-white truncate max-w-[140px] sm:max-w-none">
                SiBooks
            </span>
        </a>

        <!-- BUTTON MOBILE -->
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center justify-center w-10 h-10 text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- MENU -->
        <div class="hidden w-full md:block md:w-auto absolute md:static top-full left-0" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 mt-2 border rounded-lg bg-gray-50 w-full md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">

                <!-- MENU ITEM -->
                <li>
                    <a href="/"
                        class="block px-3 py-2 rounded text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600 dark:text-white">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="/book/kelas?id=1"
                        class="block px-3 py-2 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600 dark:text-white">
                        Kelas X
                    </a>
                </li>

                <li>
                    <a href="/book/kelas?id=2"
                        class="block px-3 py-2 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600 dark:text-white">
                        Kelas XI
                    </a>
                </li>

                <li>
                    <a href="/book/kelas?id=3"
                        class="block px-3 py-2 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600 dark:text-white">
                        Kelas XII
                    </a>
                </li>

                <!-- USER -->
                <li class="relative">
                    <button id="dropdownUserButton" data-dropdown-toggle="dropdownUser"
                        class="flex items-center gap-2 px-3 py-2 hover:text-blue-600 dark:text-white">
                        
                        <!-- Nama (hidden di mobile) -->
                        <span class="hidden lg:block text-sm font-medium">
                            {{ $isLogin->fullname }}
                        </span>

                        <!-- Foto -->
                        <div class="w-8 h-8 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ 
                                    $isLogin->image
                                        ? (str_contains($isLogin->image, 'https')
                                            ? $isLogin->image
                                            : asset('storage/' . $isLogin->image))
                                        : asset('img/default-pp.jpg') 
                                }}">
                        </div>
                    </button>

                    <!-- DROPDOWN -->
                    <div id="dropdownUser"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow dark:bg-gray-700 z-50">
                        
                        <div class="px-4 py-3 text-sm">
                            <p class="font-medium truncate">{{ $isLogin->email ?? 'User' }}</p>
                        </div>

                        @if ($isLogin->role_id == 1)
                            <a href="/admin" class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                Halaman Admin
                            </a>

                            <a href="/admin/school"
                                class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                Data Sekolah
                            </a>
                        @endif

                        <a href="/logout"
                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                            Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>