<x-default_layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex items-center justify-center w-full min-h-screen px-4 sm:px-6 lg:px-8 bg-white">
        
        <form method="post" action="/book/pengembalian"
            class="w-full max-w-lg md:max-w-xl lg:max-w-2xl bg-white p-4 sm:p-6 rounded-xl shadow-md">
            @csrf

            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="hidden" name="old_stock" value="{{ $book->stock }}">

            <!-- Judul -->
            <div class="mb-4">
                <h1 class="text-xl sm:text-2xl md:text-3xl font-medium text-gray-800">
                    Pengembalian Buku
                </h1>
            </div>

            <!-- Nama Buku -->
            <div class="mb-4 sm:mb-6">
                <label for="nama-buku"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Buku
                </label>
                <input value="{{ $book->title }}" name="title" readonly type="text" id="nama-buku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 sm:p-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <!-- Kelas -->
            <div class="mb-4 sm:mb-6">
                <label for="kelas-peminjam"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Kelas Peminjam
                </label>
                <select id="kelas-peminjam" name="id" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 sm:p-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                    @if (count($transactions) > 0)
                        <option selected disabled>Pilih Kelas</option>
                        @foreach ($transactions as $transaction)
                            <option value="{{ $transaction->id }}">
                                {{ $transaction->kelas_peminjam }}
                            </option>
                        @endforeach
                    @else
                        <option selected disabled value="">
                            Tidak ada kelas yang meminjam buku ini
                        </option>
                    @endif

                </select>
            </div>

            <!-- Jumlah -->
            <div id="book_amount" class="mb-4 sm:mb-6">
                <label for="jumlah-buku"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Jumlah Buku Yang Dikembalikan
                </label>

                @if (count($transactions) > 0)
                    <input min="1" name="amount" type="number" id="jumlah-buku"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 sm:p-3 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @else
                    <input disabled value="0" min="1" name="amount" type="number" id="jumlah-buku"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 sm:p-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @endif
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Kembalikan
            </button>

        </form>
    </div>
</x-default_layout>