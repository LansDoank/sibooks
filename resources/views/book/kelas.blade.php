<nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/logo-almadani.png" class="h-10 mt-2" alt="Flowbite Logo" />
                <span class="self-center text-2xl  whitespace-nowrap dark:text-white font-bold">SiBooks</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
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
                    <form action="/user/logout" method="POST">
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
                    </form>
                </ul>
            </div>
        </div>
    </nav>
<x-layout :school="$school">
    <section class="max-w-screen-lg  mx-auto p-8 my-4">
        <div class="text-center mb-8">
            @if ($grade|| request('search'))
                <h1 class="font-semibold text-3xl">Hasil pencarian dari : {{ $grade ? "Kelas " .  $grade :  request('search') }}</h1>
            @endif
        </div>
        <div>

            <form class="max-w-md mx-auto" action="" method="GET">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tulis judul buku..." name="search" />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari
                        Buku</button>
                </div>
            </form>
        </div>
    </section>
    <section class="max-w-screen-lg rounded-md bg-white shadow mx-auto p-8 my-14 border">
        <div>
            @if($grade)
            <div class="mb-5">
                <h1 class="text-2xl font-medium">Buku Kelas {{$grade}}</h1>
            </div>
            @endif
            <div class="flex gap-5 flex-wrap justify-center">
                @foreach ($books as $buku)
                    <div
                        class="w-56 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="/book/{{ $buku->slug }}">
                            <img class="rounded-t-lg object-cover w-full h-72"src="{{$buku->image}}"
                                alt="{{ $buku->title }}" />
                        </a>
                        <div class="p-3">
                            <a href="/book/{{ $buku->slug }}">
                                <h5 class=" text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ Str::limit($buku->title, 15) }}</h5>
                            </a>
                            <a class="mt-2 hover:underline" href="/book/kelas?id={{ $buku->grade->id }}">
                                <p class="mb-2 text-sm font-medium text-gray-700">
                                    Kelas {{ $buku->grade->name }}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
