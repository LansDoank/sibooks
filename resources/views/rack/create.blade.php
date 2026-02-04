<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <section class="bg-white dark:bg-gray-900 border shadow rounded">
        <div class="py-4 px-4 mx-auto max-w-6xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambahkan Rak Baru</h2>
            <form action="/admin/rack/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Rak</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan nama lengkap" required autofocus>
                    </div>


                    <div class="sm:col-span-2">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat
                            Kelas</label>
                        <select id="category" name="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option disabled selected>Pilih Kategori Rak</option>
                            <option value="Pelajaran">Pelajaran</option>
                            <option value="Cerita">Cerita</option>
                        </select>
                    </div>

                </div>
                <button type="submit"
                    class="inline-flex justify-self-center bg-green-500 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Tambahkan Buku
                </button>
            </form>
        </div>
    </section>
</x-dashboard>