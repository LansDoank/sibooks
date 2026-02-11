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
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Kondisi Buku :</label>

                <div id="camera-container" class="relative bg-black rounded-lg overflow-hidden mb-2"
                    style="display: none;">
                    <video id="video" class="w-full h-auto" autoplay></video>
                    <canvas id="canvas" class="hidden"></canvas>
                </div>

                <button type="button" id="start-camera"
                    class="w-full mb-2 text-sm bg-gray-600 text-white py-2 rounded-lg">Buka Kamera</button>
                <button type="button" id="take-photo"
                    class="w-full mb-2 text-sm bg-green-600 text-white py-2 rounded-lg" style="display: none;">Ambil
                    Foto</button>

                <input type="hidden" name="book_image" id="book_image">

                <img id="photo-preview" class="w-full rounded-lg hidden shadow-md mb-2">
            </div>
            <div class="mb-6">
                <label for="kondisi_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi
                    Buku</label>
                <select id="kondisi_buku" name="kondisi_buku" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled value="">Pilih Kondisi</option>
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
</script>
</x-default_layout>