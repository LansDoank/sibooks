<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Register</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="m-0 bg-slate-100">
    @if (session('success'))
        <script>
            alert({{session('success')}})
        </script>
    @endif
    <section class="bg-gray-50 dark:bg-gray-900 py-10">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="/img/logo-almadani.png" alt="logo">
                SiBooks
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Buat ke akun anda
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/user/store" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role" value="2">
                        <div>
                            @error('user_image')
                                <p
                                    class="text-red-500 text-sm rounded py-2 bg-red-100 border text-center border-red-700 mb-2">
                                    Foto Selfie harus diisi!</p>
                            @enderror
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                                Selfie</label>

                            <div id="camera-container"
                                class="relative mx-auto bg-black rounded-full overflow-hidden mb-4 w-64 h-64 border-4 border-slate-200 shadow-xl flex items-center justify-center"
                                style="display: none;">
                                <video id="video" class="absolute min-w-full min-h-full object-cover" autoplay
                                    playsinline></video>
                                <canvas id="canvas" class="hidden"></canvas>
                            </div>

                            <img id="photo-preview"
                                class="mx-auto w-64 h-64 object-cover rounded-full shadow-md mb-4 hidden border-4 border-blue-500 scale-x-[-1]">
                            <button type="button" id="start-camera"
                                class="w-full mb-2 text-sm bg-gray-600 hover:bg-gray-700 text-white py-2.5 rounded-lg transition font-semibold">Buka
                                Kamera</button>

                            <button type="button" id="take-photo"
                                class="w-full mb-2 text-sm bg-green-600 hover:bg-green-700 text-white py-2.5 rounded-lg transition font-semibold"
                                style="display: none;">Ambil Foto</button>

                            <input type="hidden" name="user_image" id="user_image">
                        </div>
                        <div>
                            <label for="fullname"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" name="fullname" id="fullname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John Doe" required="">
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-600 transition hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Daftar</button>
                        <p class="text-sm text-center font-light text-gray-500 dark:text-gray-400">
                            Sudah mempunyai akun? <a href="/login"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const startBtn = document.getElementById('start-camera');
        const takePhotoBtn = document.getElementById('take-photo');
        const cameraContainer = document.getElementById('camera-container');
        const photoPreview = document.getElementById('photo-preview');
        const imageInput = document.getElementById('user_image');

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
    </script>
</body>

</html>