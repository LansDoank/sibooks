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

                <div id="camera-wrapper"
                    class="relative overflow-hidden border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 dark:bg-gray-800 aspect-video flex items-center justify-center">
                    <video id="video" autoplay playsinline class="absolute inset-0 w-full h-full object-cover"></video>

                    <div id="overlay"
                        class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <div
                            class="w-64 h-64 border-2 border-blue-500 rounded-l0_0g opacity-50 shadow-[_0_9999px_rgba(0,0,0,0.5)]">
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
    <!-- <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const startBtn = document.getElementById('start-camera');
        const takePhotoBtn = document.getElementById('take-photo');
        const cameraContainer = document.getElementById('camera-container');
        const photoPreview = document.getElementById('photo-preview');
        const imageInput = document.getElementById('borrow_image');

        startBtn.addEventListener('click', async () => {
            try {
                // Mendapatkan daftar semua perangkat kamera
                const devices = await navigator.mediaDevices.enumerateDevices();
                const videoDevices = devices.filter(device => device.kind === 'videoinput');

                // Mencari iVCam di dalam daftar nama kamera
                const ivcam = videoDevices.find(device => device.label.toLowerCase().includes('ivcam'));

                const constraints = {
                    video: ivcam ? { deviceId: { exact: ivcam.deviceId } } : { facingMode: "user" },
                    audio: false
                };

                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                video.srcObject = stream;
                cameraContainer.style.display = 'block';
                startBtn.style.display = 'none';
                takePhotoBtn.style.display = 'block';
            } catch (err) {
                console.error(err);
                alert("Gagal mengakses kamera. Pastikan iVCam terhubung dan gunakan localhost/HTTPS.");
            }
        });

        takePhotoBtn.addEventListener('click', () => {
            const context = canvas.getContext('2d');

            // Tentukan ukuran kotak (ambil sisi terpendek dari video)
            const size = Math.min(video.videoWidth, video.videoHeight);

            // Hitung posisi tengah (offset) agar gambar tidak miring
            const sourceX = (video.videoWidth - size) / 2;
            const sourceY = (video.videoHeight - size) / 2;

            // Set ukuran canvas menjadi persegi sempurna
            canvas.width = 500; // Ukuran hasil akhir (500x500 px cukup tajam)
            canvas.height = 500;

            // Gambar ulang dengan teknik cropping: drawImage(image, sx, sy, sWidth, sHeight, dx, dy, dWidth, dHeight)
            context.drawImage(video, sourceX, sourceY, size, size, 0, 0, 500, 500);

            const data = canvas.toDataURL('image/png');
            imageInput.value = data;

            photoPreview.src = data;
            photoPreview.classList.remove('hidden');
            cameraContainer.style.display = 'none';
            takePhotoBtn.innerText = "Ambil Ulang Foto";

            // Matikan kamera
            let stream = video.srcObject;
            let tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
        });
    </script> -->
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
</x-default_layout>