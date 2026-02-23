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
            @error('borrow_image')
                <p class="text-red-500 text-sm rounded py-2 bg-red-100 border text-center border-red-700 mb-2">
                    Foto Peminjam & Buku harus diisi! </p>
            @enderror
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
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Foto Peminjam & Buku
                </label>

                <div
                    class="relative overflow-hidden border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 dark:bg-gray-800 aspect-video flex items-center justify-center">
                    <video id="video" autoplay playsinline class="absolute inset-0 w-full h-full object-cover"></video>

                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <div
                            class="w-64 h-64 border-2 border-blue-500 rounded-lg opacity-50 shadow-[0_0_0_9999px_rgba(0,0,0,0.5)]">
                        </div>
                        <p class="text-white text-xs mt-4 font-light bg-blue-600 px-3 py-1 rounded-full">Posisikan Wajah
                            & Buku di dalam kotak</p>
                    </div>

                    <img id="photo-preview" class="absolute inset-0 w-full h-full object-cover hidden" />
                </div>

                <div class="flex items-center justify-between mt-3">
                    <div id="status-container" class="flex items-center gap-2">
                        <span id="status-dot" class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
                        <p id="status-text" class="text-sm text-gray-600 dark:text-gray-400">Kamera Mati</p>
                    </div>

                    <button type="button" id="capture-btn"
                        class="text-xs bg-gray-200 hover:bg-gray-300 px-3 py-2 rounded-lg font-semibold transition">
                        Ambil Ulang Foto
                    </button>
                </div>

                <canvas id="canvas" class="hidden"></canvas>
                <input type="hidden" id="borrow_image" name="borrow_image" required>
            </div>
            <div class="mb-6">
                <label for="book_condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi Buku :</label>
                <select id="book_condition" name="book_condition" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled >Pilih Kondisi</option>
                    <option value="Mulus">Mulus</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Butuh Perbaikan">Butuh Perbaikan</option>
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pinjam</button>
        </form>
    </div>
<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const inputFoto = document.getElementById('borrow_image');
    const statusText = document.getElementById('status-text');
    const statusDot = document.getElementById('status-dot');
    const preview = document.getElementById('photo-preview');
    const captureBtn = document.getElementById('capture-btn');

    // 1. Akses Kamera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
            statusText.innerText = "Kamera Ready";
            statusDot.classList.replace('bg-red-500', 'bg-green-500');
        })
        .catch(err => {
            statusText.innerText = "Gagal akses kamera!";
            console.error(err);
        });

    // 2. Fungsi Ambil Foto
    function takeSnapshot() {
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        
        const dataUrl = canvas.toDataURL('image/jpeg');
        inputFoto.value = dataUrl;
        
        // Tampilkan preview ke user
        preview.src = dataUrl;
        preview.classList.remove('hidden');
        video.classList.add('hidden');
    }

    // Ambil foto otomatis saat user pindah ke input Kondisi Buku 
    // atau biarkan user klik tombol ambil ulang
    captureBtn.addEventListener('click', () => {
        if(preview.classList.contains('hidden')) {
            takeSnapshot();
            captureBtn.innerText = "Ambil Ulang";
        } else {
            preview.classList.add('hidden');
            video.classList.remove('hidden');
            captureBtn.innerText = "Jepret";
        }
    });

    // Validasi sebelum submit: Ambil foto jika user lupa jepret
    document.querySelector('form').addEventListener('submit', function(e) {
        if (!inputFoto.value) {
            takeSnapshot();
        }
    });
</script>
</x-default_layout>