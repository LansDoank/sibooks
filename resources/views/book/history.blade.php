<x-navbar :isLogin="$user" :school="$school"></x-navbar>
<x-layout :school="$school">
    <div class="max-w-6xl mx-auto px-4 py-6 md:mt-24">
        <!-- Card Container -->
        <div class="space-y-4 flex flex-col justify-center items-center">
            <h1 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800">
                Riwayat Peminjaman Buku
            </h1>
            @forelse ($transactions as $transaction)
                <div
                    class="md:w-[80%] lg:w-[60%] bg-white shadow rounded-2xl p-4 md:p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <!-- Info Buku -->
                    <div class="flex items-center md:items-start justify-center flex-wrap gap-4">
                        <img src="{{ asset('/storage' . $transaction->book->image) ?? 'https://via.placeholder.com/80' }}" alt="cover"
                            class="w-32 h-42 object-cover object-center rounded-lg">

                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">
                                {{ $transaction->book->title }}
                            </h2>
                            <p class="text-sm text-gray-500">
                                Penulis: {{ $transaction->book->author }}
                            </p>

                            <div class="text-sm text-gray-400 mt-2">
                                Jumlah Buku: {{ $transaction->jumlah_buku }}
                            </div>
                            <div class="text-sm text-gray-400">
                                Kondisi Buku: {{ $transaction->kondisi_buku }}
                            </div>
                            <div class="text-sm text-gray-400">
                                Dipinjam: {{ \Carbon\Carbon::parse($transaction->borrow_time)->format('d M Y') }}
                            </div>
                            <div class="text-sm text-gray-400">
                                Kembali: {{ \Carbon\Carbon::parse($transaction->return_time)->format('d M Y') }}
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="flex flex-col md:items-end gap-2">
                        @if ($transaction->is_verified == true)
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700 text-center w-full md:w-fit">
                                Dipinjam
                            </span>
                        @elseif ($transaction->is_verified == false)
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700 w-fit">
                                Belum Diverifikasi
                            </span>
                            @endif
                            <!-- Button kode qr -->
                            <a href="/book/verification/{{ $transaction->id }}" class="text-sm text-center bg-blue-600 text-white hover:bg-blue-700 py-2 px-4 rounded-full">
                                Lihat Kode Qr
                            </a>

                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 py-10">
                    Tidak ada riwayat peminjaman
                </div>
            @endforelse
        </div>
    </div>


</x-layout>