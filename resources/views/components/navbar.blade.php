@props(['school', 'isLogin'])
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset(($school?->logo) ? 'storage/' . $school->logo : 'logo-almadani.png') }}"
                class="h-10 mt-2" alt="School Logo" />
            <span class="self-center text-2xl  whitespace-nowrap dark:text-white font-bold">SiBooks</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="flex items-center">
                    <a href="/"
                        class="block py-2 px-3 text-white hover:text-blue-500 rounded md:bg-transparent md:text-gray-900 md:p-0 dark:text-white md:dark:text-blue-500"
                        aria-current="page">Beranda</a>
                </li>
                <li class="flex items-center">
                    <a href="/book/kelas?id=1"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kelas
                        X</a>
                </li>
                <li class="flex items-center">
                    <a href="/book/kelas?id=2"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kelas
                        XI</a>
                </li>
                <li class="flex items-center">
                    <a href="/book/kelas?id=3"
                        class="block py-2 px-3 flex items-center text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kelas
                        XII</a>
                </li>
                <li class="flex items-center">
                    <button id="dropdownUserButton" data-dropdown-toggle="dropdownUser"
                        class="flex items-center text-sm font-medium text-gray-900 px-2 hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4  dark:text-white"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        <span class="mr-3 hidden lg:inline">{{ $isLogin->fullname }}</span>
                        <img class="w-10 h-10 rounded-full overflow-hidden" src="{{ $isLogin->image }}" alt="user photo">

                    </button>

                    <div id="dropdownUser"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div class="font-medium truncate">{{ $isLogin->email ?? 'User' }}</div>
                        </div>
                        <ul class=" text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserButton">
                        @if ($isLogin->role_id == 1)
                                <li>
                                    <a href="/admin"
                                        class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                        </svg>
                                        Halaman Admin
                                    </a>
                                </li>
                            @endif
                        </ul>
                        <ul class=" text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserButton">
                            <li>
                                <a href="/admin/school"
                                    class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-gear-fill mr-2" viewBox="0 0 16 16">
                                        <path
                                            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                    </svg>
                                    Data Sekolah
                                </a>
                            </li>
                        </ul>
                        <div class="">
                            <a href="/logout"
                                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a>
                        </div>
                    </div>
                </li>
                <!-- <form action="/user/logout" method="POST" class="m-0">
                    @csrf
                    @if(!$isLogin)
                        <li class="text-center">
                            <a href="/login"
                                class="block box-border text-white rounded bg-blue-500  lg:px-5 lg:py-2 border hover:border-blue-400 hover:text-blue-600 transition hover:bg-gray-100 "
                                type="button">Masuk</a>
                        </li>
                    @else
                        <li class="text-center">
                            <a href="/logout"
                                class="block box-border text-white rounded bg-red-500 hover:text-red-500 lg:px-5 lg:py-2 border   hover:border-red-400 transition hover:bg-gray-100 "
                                type="button">Keluar</a>
                        </li>

                    @endif
                </form> -->
            </ul>
        </div>
    </div>
</nav>