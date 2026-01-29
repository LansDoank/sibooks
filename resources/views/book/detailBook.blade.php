<x-navbar :isLogin="$isLogin" :school="$school"></x-navbar>
<x-layout :school="$school">
    <section class="bg-white dark:bg-gray-900 antialiased pt-32">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="shrink-0 max-w-md lg:max-w-lg flex justify-end">
                    <img class="w-[65%] object-cover" src="{{$book->image}}" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0 flex flex-col justify-center">
                    <h1 class="text-xl text-gray-900 font-bold sm:text-4xl mb-7 font-semibold dark:text-white">
                        {{ $book->title }}
                    </h1>
                    <div class="text-xl">
                        <a href="#">
                            <p class="text-gray-600 font-medium mt-1">Kelas : {{ $book->grade->name }}</p>
                        </a>
                        <p class="text-gray-600 font-medium mt-1">Stock : {{ $book->stock }}</p>
                        <div class="mt-1 sm:items-center sm:gap-4 sm:flex">
                            <p class=" font-medium text-gray-600 dark:text-white">
                                Penulis : {{ $book->author }}
                            </p>
                        </div>
                    </div>
                    @if($book->stock <= 0)
                        <div class="my-3">
                            <p class="text-sm text-red-600">Maaf Buku Kosong</p>
                        </div>
                    @endif
                    <div class="w-full mt-3 sm:items-center sm:mt-5 grid grid-cols-2 gap-3">
                        @if ($book->stock > 0)
                            <a href="/book/pinjam/{{ $book->id }}" data-modal-target="popup-modal"
                                data-modal-toggle="popup-modal" type="button" title=""
                                class=" flex justify-center text-white font-medium items-center bg-green-600  border py-2 px-5 rounded bg-green-500 hover:bg-green-700 transition">
                                Pinjam
                            </a>
                        @else
                            <button disabled data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                                title=""
                                class=" flex justify-center cursor-pointer text-white font-medium items-center border py-2 px-5 rounded bg-gray-500">
                                Pinjam
                            </button>
                        @endif
                        <a href="/book/pengembalian/{{ $book->id }}" data-modal-target="popup-modal"
                            data-modal-toggle="popup-modal" type="button" title=""
                            class=" flex justify-center text-white font-medium items-center hover:bg-red-600 transition border py-2 px-5 rounded bg-red-500">
                            Kembalikan
                        </a>
                        
                    </div>



                </div>
            </div>
        </div>
    </section>
</x-layout>