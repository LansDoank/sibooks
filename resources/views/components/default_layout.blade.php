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
    document.addEventListener('DOMContentLoaded', function() {
        const classSelect = document.querySelector('#kelas-peminjam');
        const amountSelect = document.querySelector('#book_amount');

        if (classSelect) {
            classSelect.addEventListener('change', function() {
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
    document.addEventListener('DOMContentLoaded', function() {

        const borrower_input = document.querySelector('#borrower-input');
        const borrower_image = document.querySelector('#borrower-image');

        borrower_input.addEventListener('change', () => {
            const image = borrower_input.files[0];
            if (image) {
                const reader = new FileReader();
                reader.onload = function(e) {
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

</html>
