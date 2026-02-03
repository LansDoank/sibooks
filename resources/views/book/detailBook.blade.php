<x-navbar :isLogin="$isLogin" :school="$school"></x-navbar>
<x-layout :school="$school">
    <section class="bg-white dark:bg-gray-900 antialiased pt-32">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="shrink-0 max-w-md lg:max-w-lg flex justify-end">
                    <img class="w-[65%] object-cover" src="{{asset('storage/' . $book->image)}}" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0 flex flex-col justify-center">
                    <h1 class="text-xl text-gray-900 sm:text-4xl mb-7 font-semibold dark:text-white">
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
                    <div class="w-full mt-3 sm:items-center sm:mt-5 grid grid-cols-2 gap-3">
                        <button onclick="bukaPeta('{{ $book->id_rak }}')"
                            class="bg-blue-600 hover:bg-blue-700 text-center text-white font-semibold py-2 px-4 rounded shadow-md transition duration-300 flex justify-center items-center gap-2">
                            Lihat Lokasi Rak
                        </button>

                    </div>



                </div>
            </div>
        </div>
    </section>


    <div id="modalPeta" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75" onclick="tutupModal()"></div>

            <div
                class="inline-block  overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4 ">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Lokasi Buku di Perpustakaan</h3>
                        <button onclick="tutupModal()"
                            class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                    </div>

                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 bg-gray-50">
                        <div class="w-full h-auto">
                            {{-- Pastikan file ada di: public/img/denah-perpus.svg --}}
                            {!! file_get_contents(public_path('img/denah-perpus.svg')) !!}
                        </div>
                    </div>

                    <p class="mt-4 text-sm text-gray-500 italic">
                        *Rak yang berwarna kuning adalah lokasi buku yang Anda cari.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function bukaPeta(rakId) {
            const modal = document.getElementById('modalPeta');
            modal.classList.remove('hidden');

            
        }

        function tutupModal() {
            const modal = document.getElementById('modalPeta');
            modal.classList.add('hidden');
        }

        // Tutup modal dengan tombol Esc
        window.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                tutupModal();
            }
        });
        function highlightRak(idRakYangDicari) {
            // 1. Tentukan warna
            const warnaDefault = "#8B4513"; // Cokelat
            const warnaHighlight = "#FFFF00"; // Kuning

            // 2. Ambil semua elemen rak (misalnya semua 'rect' di dalam SVG)
            const semuaRak = document.querySelectorAll('#denah-perpustakaan rect');

            // 3. Reset semua rak ke warna cokelat
            semuaRak.forEach(rak => {
                rak.style.fill = warnaDefault;
            });

            // 4. Cari rak yang spesifik dan ubah warnanya menjadi kuning
            const rakTarget = document.getElementById(idRakYangDicari);
            if (rakTarget) {
                rakTarget.style.fill = warnaHighlight;
            }
        }

        // Gabungkan logicnya seperti ini:
        async function inisialisasiBuku() {
            const pathArray = window.location.pathname.split('/');
            const slug = pathArray[pathArray.length - 1];

            try {
                const response = await fetch(`http://localhost:8000/api/book/${slug}`);
                const buku = await response.json();

                if (buku) {
                    highlightRak(buku.rack.name);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }

        // Jalankan fungsi saat halaman selesai loading
        window.onload = inisialisasiBuku;
    </script>
</x-layout>