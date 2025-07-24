<x-layout>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-lg px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full dark:hidden" src="/ipas.jpg" alt="{{ $book->title }}" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ $book->title }}
                    </h1>
                    <a href="#">
                        <p class="text-gray-600 font-medium mt-1">Kelas : {{ $book->kelas->name }}</p>
                    </a>
                    <p class="text-gray-600 font-medium mt-1">Stock {{ $book->stock }}</p>
                    <div class="mt-1 sm:items-center sm:gap-4 sm:flex">
                        <p class=" font-medium text-gray-600 dark:text-white">
                            Penulis : {{ $book->author }}
                        </p>
                    </div>
                    @if($book->stock <= 0)
                    <div class="my-3">
                        <p class="text-sm text-red-600">Maaf Buku Kosong</p>
                    </div>
                    @endif
                    <div class="mt-3 sm:gap-4 sm:items-center sm:flex sm:mt-2">
                        @if ($book->stock > 0)
                            <a href="/book/pinjam/{{ $book->id }}" data-modal-target="popup-modal"
                                data-modal-toggle="popup-modal" type="button" title=""
                                class="flex text-white font-medium items-center bg-green-600  border py-2 px-5 rounded bg-green-500 hover:bg-green-700 transition">
                                Pinjam Buku
                            </a>
                        @else
                            <button disabled data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                                title=""
                                class="flex cursor-pointer text-white font-medium items-center border py-2 px-5 rounded bg-gray-500">
                                Pinjam Buku
                            </button>
                        @endif
                        <a href="/book/pengembalian/{{ $book->id }}" data-modal-target="popup-modal"
                            data-modal-toggle="popup-modal" type="button" title=""
                            class="flex text-white font-medium items-center hover:bg-yellow-600 transition border py-2 px-5 rounded bg-yellow-500">
                            Kembalikan Buku
                        </a>
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        Studio quality three mic array for crystal clear calls and voice
                        recordings. Six-speaker sound system for a remarkably robust and
                        high-quality audio experience. Up to 256GB of ultrafast SSD storage.
                    </p>

                    <p class="text-gray-500 dark:text-gray-400">
                        Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
                        Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
                        Magic Keyboard or Magic Keyboard with Touch ID.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
