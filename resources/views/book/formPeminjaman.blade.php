<x-default_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex items-center max-w-lg mx-auto my-10 h-max">
        <form method="post" action="/book/pinjam" class="w-full" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $book->id }}">
            <input type="hidden" name="stock" value="{{ $book->stock }}">
            <div class="mb-3">
                <h1 class="text-2xl font-medium text-gray-800">Pinjam Buku</h1>
            </div>
            <div class="mb-6">
                <label for="nama-buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Buku</label>
                <input value="{{ $book->title }}" name="title" readonly type="text" id="nama-buku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="jumlah-buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                    Buku <p class="text-gray-500 font-base text-xs">Stock : {{ $book->stock }}</p></label>
                <input value="{{ $book->stock }}" min="1" max="{{ $book->stock }}" name="amount" type="number"
                    id="jumlah-buku"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas
                    Peminjam</label>
                <select id="class" name="class" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled value="">Pilih Kelas</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{$classroom->name}}">{{$classroom->name}}</option>
                    @endforeach
                </select>
            </div>
            <!-- <div class="mb-6">
                <label for="borrower-image" id="borrower-image"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Peminjam :
                    <div>
                        <img src="" alt="">
                    </div>
                </label>
                <input type="file" name="borrower-image" id="borrower-input">
            </div> -->
            <div class="mb-6">
                <label for="borrower-image" id="borrower-image"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Peminjam :
                </label>
                <video id="video" autoplay playsinline style="width:100%;"></video>
                <canvas id="canvas" hidden></canvas>

                <input type="hidden" id="borrower_image" name="borrower_image">
                <p id="status">Mendeteksi wajah...</p>

            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pinjam</button>
        </form>
    </div>
</x-default_layout>