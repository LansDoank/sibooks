<x-dashboard :title="$title" :heading="$heading" :user="$user" >
    <section class="bg-white dark:bg-gray-900  border shadow rounded">
        <div class="py-4 px-4 mx-auto max-w-6xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Transaksi</h2>
            <form action="/admin/transaction/update" method="post">
                <input type="hidden" name="id" value="{{ $transaction->id }}">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Kelas</label>
                        <input value="{{ $transaction->kelas_peminjam }}" type="text" name="class" id="fullname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan nama lengkap"  autofocus>
                    </div>
                    <div class="w-full">
                        <label for="amount"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Buku</label>
                        <input value="{{ $transaction->jumlah_buku }}" type="number" name="amount" id="amount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="50" >
                    </div>
                    <div class="w-full">
                        <label for="is_verified"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verifikasi Admin</label>
                        <select name="is_verified" id="is_verified" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="1" {{ $transaction->is_verified == 1 ? 'selected' : '' }}>Sudah Diverifikasi</option>
                            <option value="0" {{ $transaction->is_verified == 0 ? 'selected' : '' }}>Belum Diverifikasi</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="borrow_time"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pinjam</label>
                        <input value="{{ $transaction->borrow_time }}" type="date" name="borrow_time" id="borrow_time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="50" >
                    </div>
                    <div class="w-full">
                        <label for="return_time"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pengembalian</label>
                        <input value="{{ $transaction->return_time }}" type="date" name="return_time" id="return_time"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            >
                    </div>
                    
                </div>
                <button type="submit"
                    class="inline-flex justify-self-center bg-green-500 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan Akun
                </button>
            </form>
        </div>
    </section>
</x-dashboard>