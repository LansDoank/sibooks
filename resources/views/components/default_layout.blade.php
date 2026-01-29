<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')

</head>

<body>
    {{ $slot }}
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const classSelect = document.querySelector('#kelas-peminjam');
        const amountSelect = document.querySelector('#book_amount');

        if (classSelect) {
            classSelect.addEventListener('change', function () {
                const classValue = classSelect.value;
                fetch(`/api/kelas/${classValue}`)
                    .then((res) => res.json())
                    .then((data) => {
                        amountSelect.innerHTML =
                            `<label for="jumlah-buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                    Buku Yang Dikembalikan</label><input min="${data.jumlah_buku}" max="${data.jumlah_buku}" value="${data.jumlah_buku}"  name="amount" type="number" id="jumlah-buku"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">`;
                    })
            })
        }

    })
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const borrower_input = document.querySelector('#borrower-input');
        const borrower_image = document.querySelector('#borrower-image');

        borrower_input.addEventListener('change', () => {
            const image = borrower_input.files[0];
            if (image) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    borrower_image.innerHTML = `
                        Foto Peminjam :
                            <div class="w-full h-[400px]  my-2 border border-gray-200 rounded-lg flex justify-center items-center">
                                <img class="w-full h-full object-cover" src="${e.target.result}" alt="">
                            </div>`;
                };
                reader.readAsDataURL(image);
            }
        })
    })
</script>
<!-- <script src="https://unpkg.com/face-api.js"></script> -->
<!-- <script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const photoInput = document.getElementById('borrower_image');
    const statusText = document.getElementById('status');

    let captured = false;
    let stream;

    Promise.all([
        faceapi.nets.tinyFaceDetector.loadFromUri('/models')
    ]).then(initCamera);

    async function initCamera() {
        try {
            // ✅ 1. MINTA IZIN KAMERA DULU (WAJIB)
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;

            // ✅ 2. BARU ambil daftar device
            const devices = await navigator.mediaDevices.enumerateDevices();

            const ivcam = devices.find(
                d => d.kind === 'videoinput' &&
                    d.label.toLowerCase().includes('ivcam')
            );

            // ✅ 3. Kalau iVCam ada → switch ke iVCam
            if (ivcam) {
                stream.getTracks().forEach(track => track.stop());

                stream = await navigator.mediaDevices.getUserMedia({
                    video: { deviceId: { exact: ivcam.deviceId } }
                });

                video.srcObject = stream;
                statusText.innerText = "Kamera iVCam aktif ✅";
            } else {
                statusText.innerText = "Kamera default aktif ✅";
            }

        } catch (err) {
            console.error(err);
            statusText.innerText = "Kamera tidak bisa dibuka ❌";
        }
    }

    video.addEventListener('play', () => {
        setInterval(async () => {
            if (captured) return;

            const detection = await faceapi.detectSingleFace(
                video,
                new faceapi.TinyFaceDetectorOptions()
            );

            if (detection) {
                captured = true;
                statusText.innerText = "Wajah terdeteksi ✅";

                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0);

                photoInput.value = canvas.toDataURL('image/png');

                setTimeout(() => {
                    document.forms[0].submit();
                }, 500);
            }
        }, 500);
    });
</script> -->
<script defer src="https://unpkg.com/face-api.js@0.22.2/dist/face-api.min.js"></script>
<script defer src="https://unpkg.com/face-api.js@0.22.2/dist/face-api.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const photoInput = document.getElementById('borrower_image');
    const statusText = document.getElementById('status');

    let captured = false;
    let stream;

    Promise.all([
        faceapi.nets.tinyFaceDetector.loadFromUri('/models')
    ]).then(initCamera);

    async function initCamera() {
        try {
            // STEP 1: minta izin kamera dulu
            stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;

            // STEP 2: cari iVCam
            const devices = await navigator.mediaDevices.enumerateDevices();

            const ivcam = devices.find(
                d => d.kind === 'videoinput' &&
                d.label.toLowerCase().includes('ivcam')
            );

            if (ivcam) {
                stream.getTracks().forEach(t => t.stop());
                stream = await navigator.mediaDevices.getUserMedia({
                    video: { deviceId: { exact: ivcam.deviceId } }
                });
                video.srcObject = stream;
                statusText.innerText = "Kamera iVCam aktif ✅";
            } else {
                statusText.innerText = "Kamera default aktif ✅";
            }

        } catch (err) {
            console.error(err);
            statusText.innerText = "Kamera tidak bisa dibuka ❌";
        }
    }

    video.addEventListener('play', () => {
        setInterval(async () => {
            if (captured) return;

            const detection = await faceapi.detectSingleFace(
                video,
                new faceapi.TinyFaceDetectorOptions()
            );

            if (detection) {
                captured = true;
                statusText.innerText = "Wajah terdeteksi ✅";

                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0);

                photoInput.value = canvas.toDataURL('image/png');

                // setTimeout(() => document.forms[0].submit(), 500);
            }
        }, 500);
    });
});
</script>


</html>