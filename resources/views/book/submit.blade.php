<x-default_layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex items-center justify-center w-full px-4 sm:px-6 lg:px-8 my-6 sm:my-10">
       <form method="post" action="/book/submit/store" class="w-full max-w-lg md:max-w-xl lg:max-w-2xl">
            @csrf
            <input type="hidden" name="id" value="{{ $book->id }}">
            <input type="hidden" name="stock" value="{{ $book->stock }}">
            <div class="mb-3">
                <h1 class="text-xl sm:text-2xl font-medium text-gray-800">Ajukan Peminjaman Buku</h1>
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
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Foto Peminjam & Buku
                </label>

                <div id="camera-wrapper"
    class="relative overflow-hidden border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 dark:bg-gray-800 aspect-[4/3] sm:aspect-video flex items-center justify-center">
                    <video id="video" autoplay playsinline class="absolute inset-0 w-full h-full object-cover"></video>

                    <div id="overlay"
                        class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <div
                            class="w-40 h-40 sm:w-56 sm:h-56 md:w-64 md:h-64 border-2 border-blue-500 rounded-lg opacity-50 shadow-[0_0_0_9999px_rgba(0,0,0,0.5)]">
                        </div>
                        <p class="text-white text-xs mt-4 font-light bg-blue-600 px-3 py-1 rounded-full">Posisikan Wajah
                            & Buku di dalam kotak</p>
                    </div>

                    <img id="photo-preview" class="absolute inset-0 w-full h-full object-cover hidden" />
                </div>

                <div class="flex items-center justify-between mt-3">
                    <div class="flex items-center gap-2">
                        <span id="status-dot" class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
                        <p id="status-text" class="text-sm text-gray-600 dark:text-gray-400">Kamera Mati</p>
                    </div>

                    <button type="button" id="take-photo"
                        class="text-xs bg-blue-100 text-blue-700 hover:bg-blue-200 px-4 py-2 rounded-lg font-semibold transition">
                        Ambil Foto
                    </button>
                </div>

                <canvas id="canvas" class="hidden"></canvas>
                <input type="hidden" id="borrow_image" name="borrow_image" required>
            </div>
            <div class="mb-6">
                <label for="book_condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi
                    Buku :</label>
                <select id="book_condition" name="book_condition" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Pilih Kondisi</option>
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
    const takePhotoBtn = document.getElementById('take-photo');
    const photoPreview = document.getElementById('photo-preview');
    const imageInput = document.getElementById('borrow_image');
    const statusText = document.getElementById('status-text');
    const statusDot = document.getElementById('status-dot');
    const overlay = document.getElementById('overlay');

    let stream = null;

    // Fungsi mulai kamera otomatis
    async function startCamera() {
        try {
            const devices = await navigator.mediaDevices.enumerateDevices();
            const videoDevices = devices.filter(device => device.kind === 'videoinput');
            const ivcam = videoDevices.find(device => device.label.toLowerCase().includes('ivcam'));

            const constraints = {
                video: ivcam ? { deviceId: { exact: ivcam.deviceId } } : { facingMode: "user" },
                audio: false
            };

            stream = await navigator.mediaDevices.getUserMedia(constraints);
            video.srcObject = stream;
            statusText.innerText = "Kamera Ready";
            statusDot.classList.replace('bg-red-500', 'bg-green-500');
        } catch (err) {
            statusText.innerText = "Kamera Gagal";
            console.error(err);
        }
    }

    // Jalankan kamera saat halaman load
    startCamera();

    takePhotoBtn.addEventListener('click', () => {
        if (photoPreview.classList.contains('hidden')) {
            // PROSES AMBIL FOTO
            const context = canvas.getContext('2d');
            const size = Math.min(video.videoWidth, video.videoHeight);
            const sourceX = (video.videoWidth - size) / 2;
            const sourceY = (video.videoHeight - size) / 2;

            canvas.width = 500;
            canvas.height = 500;

            context.drawImage(video, sourceX, sourceY, size, size, 0, 0, 500, 500);

            const data = canvas.toDataURL('image/png');
            imageInput.value = data; // Masukkan ke input hidden

            // Tampilkan Preview, Sembunyikan Video & Overlay
            photoPreview.src = data;
            photoPreview.classList.remove('hidden');
            video.classList.add('hidden');
            overlay.classList.add('hidden');
            
            takePhotoBtn.innerText = "Ambil Ulang Foto";
            takePhotoBtn.classList.replace('bg-blue-100', 'bg-gray-200');
        } else {
            // PROSES RESET (AMBIL ULANG)
            photoPreview.classList.add('hidden');
            video.classList.remove('hidden');
            overlay.classList.remove('hidden');
            imageInput.value = "";
            
            takePhotoBtn.innerText = "Ambil Foto";
            takePhotoBtn.classList.replace('bg-gray-200', 'bg-blue-100');
        }
    });
</script>
    <!-- <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const startBtn = document.getElementById('start-camera');
        const takePhotoBtn = document.getElementById('take-photo');
        const cameraContainer = document.getElementById('camera-container');
        const photoPreview = document.getElementById('photo-preview');
        const imageInput = document.getElementById('book_image');

        startBtn.addEventListener('click', async () => {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: "user" }, audio: false });
                video.srcObject = stream;
                cameraContainer.style.display = 'block';
                startBtn.style.display = 'none';
                takePhotoBtn.style.display = 'block';
            } catch (err) {
                alert("Gagal mengakses kamera: " + err);
            }
        });

        takePhotoBtn.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const data = canvas.toDataURL('image/png');
            imageInput.value = data; // Simpan string base64 ke input hidden

            photoPreview.src = data;
            photoPreview.classList.remove('hidden');
            cameraContainer.style.display = 'none';
            takePhotoBtn.innerText = "Ambil Ulang Foto";

            // Hentikan kamera setelah ambil foto
            let stream = video.srcObject;
            let tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
        });
    </script> -->
</x-default_layout>