<x-dashboard :title="$title"  :heading="$heading" :user="$user">
    <section class="bg-white dark:bg-gray-900 shadow border rounded">
        <div class="py-4 px-4 mx-auto max-w-6xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambahkan Kelas Baru</h2>
            <form action="/admin/class/store" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 lg:gap-y-0">
                    <div class="sm:col-span-2 mb-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Kelas</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan nama kelas" required autofocus>
                    </div>
                    <div>

                        <button type="submit"
                            class="inline-flex justify-self-center bg-green-500 items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Tambahkan Kelas
                        </button>
                    </div>
            </form>
        </div>
    </section>
</x-dashboard>