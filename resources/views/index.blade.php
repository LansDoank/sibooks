<x-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-md sm:py-16 lg:px-6">
            <div class="max-w-screen mb-8 lg:mb-16 text-center">
                <h2 class="mb-4 text-5xl tracking-tight font-extrabold text-gray-900 dark:text-white">PERPUSTAKAAN DIGITAL <br>
                    SMK Al-MADANI GARUT</h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">Here at Flowbite we focus on markets where
                    technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
            </div>
            <div>

                <form class="max-w-md mx-auto" action="/book/tampil" method="GET">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-screen-lg bg-white shadow-xl border rounded-md p-8">
            <div class="kelas-x mt-2">
                <div class="mb-5 flex justify-between">
                    <h1 class="text-xl font-semibold">Buku Paket Kelas X</h1>
                    <a class="text-blue-600 font-medium" href="/book/kelas?id=1">Lihat Semuanya</a>
                </div>
                <div class="flex gap-5 flex-wrap justify-center">
                    @foreach ($kelasX as $buku)
                        <div
                            class="w-56 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="/book/{{ $buku->id }}">
                                <img class="rounded-t-lg object-cover w-full h-72" src="/ipas.jpg"
                                    alt="{{ $buku->title }}" />
                            </a>
                            <div class="p-3">
                                <a href="/book/{{ $buku->id }}">
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
            <div class="kelas-xi my-6">
                <div class="mb-5 flex justify-between">
                    <h1 class="text-xl font-semibold">Buku Paket Kelas XI</h1>
                    <a class="text-blue-600 font-medium" href="/book/kelas?id=2">Lihat Semuanya</a>
                </div>
                <div class="flex gap-5 flex-wrap justify-center">
                    @foreach ($kelasXi as $buku)
                        <div
                            class="w-56 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="/book/{{ $buku->id }}">
                                <img class="rounded-t-lg object-cover w-full h-72" src="/ipas.jpg"
                                    alt="{{ $buku->title }}" />
                            </a>
                            <div class="p-3">
                                <a href="/book/{{ $buku->id }}">
                                    <h5 class=" text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ Str::limit($buku->title, 15) }}</h5>
                                </a>
                                <a class=" mt-2" href="/book/kelas?id=2">
                                    <p class="mb-2 text-sm font-medium text-gray-700 hover:underline">
                                        Kelas {{ $buku->grade->name }}
                                    </p>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="kelas-xii my-6">
                <div class="mb-5 flex justify-between">
                    <h1 class="text-xl font-semibold">Buku Paket Kelas XII</h1>
                    <a class="text-blue-600 font-medium" href="/book/kelas?id=3">Lihat Semuanya</a>
                </div>
                <div class="flex gap-5 flex-wrap justify-center">
                    @foreach ($kelasXii as $buku)
                        <div
                            class="w-56 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="/book/{{ $buku->id }}">
                                <img class="rounded-t-lg object-cover w-full h-72" src="/ipas.jpg"
                                    alt="{{ $buku->title }}" />
                            </a>
                            <div class="p-3">
                                <a href="/book/{{ $buku->id }}">
                                    <h5 class=" text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ Str::limit($buku->title, 15) }}</h5>
                                </a>
                                <a class="hover:underline" href="/book/kelas?id=3">
                                    <p class="mb-2 text-sm font-medium text-gray-700">
                                        Kelas {{ $buku->grade->name }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>
