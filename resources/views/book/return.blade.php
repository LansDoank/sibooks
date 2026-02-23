<x-default_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex items-center max-w-lg mx-auto h-screen">
        <form method="post" action="/book/pengembalian" class="w-full">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="hidden" name="old_stock" value="{{ $book->stock }}">
            <div class="mb-3">
                <h1 class="text-2xl font-medium text-gray-800">Pengembalian Buku</h1>
            </div>
            <div class="mb-6">
                <label for="nama-buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Buku</label>
                <input value="{{ $book->title }}" name="title" readonly type="text" id="nama-buku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="kelas-peminjam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas
                    Peminjam</label>
                <select id="kelas-peminjam" name="id" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if (count($transactions) > 0)
                        <option selected disabled>Pilih Kelas</option>
                        @foreach ($transactions as $transaction)
                            <option value="{{ $transaction->id }}">{{ $transaction->kelas_peminjam }}</option>
                        @endforeach
                    @else
                        <option selected disabled value="">Tidak ada kelas yang meminjam buku ini</option>
                    @endif
                </select>
            </div>
            <div id="book_amount" class="mb-6">
                <label for="jumlah-buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                    Buku Yang Dikembalikan</label>
                @if (count($transactions) > 0)
                    <input min="1" name="amount" type="number" id="jumlah-buku"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @else
                    <input disabled value="0" min="1" name="amount" type="number" id="jumlah-buku"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @endif
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembalikan</button>
        </form>
    </div>
</x-default_layout>
