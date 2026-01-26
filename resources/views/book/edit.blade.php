<x-dashboard :title="$title" :heading="$heading" :user="$user" >
    <section class="bg-white dark:bg-gray-900  border shadow rounded">
        <div class="py-4 px-4 mx-auto max-w-6xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Buku</h2>
            <form action="/admin/book/update" method="post">
                <input type="hidden" name="id" value="{{ $book->id }}">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Judul Buku</label>
                        <input value="{{ $book->title }}" type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan nama lengkap" required autofocus>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tingkat Kelas</label>
                        <select for="class" name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}" {{ $book->grade_id == $grade->id ? 'selected' : '' }}>{{ $grade->name }}</option>
                        @endforeach    
                        </select>
                        
                    </div>
                    <div class="w-full">
                        <label for="stock"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok Buku</label>
                        <input value="{{ $book->stock }}" type="number" name="stock" id="stock"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Email Lengkap" required>
                    </div>
                    <div class="w-full">
                        <label for="year"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
                        <input value="{{ $book->year }}" type="number" name="year" id="year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan Password" >
                    </div>
                    <div class="w-full">
                        <label for="publisher"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                        <input value="{{ $book->publisher }}" type="text" name="publisher" id="publisher"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan Password" >
                    </div>
                    <div class="w-full">
                        <label for="author"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                        <input value="{{ $book->author }}" type="text" name="author" id="author"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan Password" >
                    </div>
                   
                </div>
                <button type="submit"
                    class="inline-flex justify-self-center bg-green-500 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Simpan Buku
                </button>
            </form>
        </div>
    </section>
</x-dashboard>