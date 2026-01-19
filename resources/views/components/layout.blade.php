<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiBooks - Perpustakaan Digital SMK AL-MADANI GARUT</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
</head>

<body class="bg-white">
 

    {{$slot}}
    <x-footer></x-footer>
    <script>
        const typed = new Typed('#heading-index', {
            strings: ["PERPUSTAKAAN DIGITAL <br> SMK Al-MADANI GARUT</h2>"],
            typeSpeed: 50,
            showCursor: false,
        });
        const typed1 = new Typed('#subheading-index', {
            strings: ["Dengan SiBooks, membaca buku jadi mudah, cepat,dan menyenangkan. "],
            typeSpeed: 50,
            showCursor: false,
            startDelay: 3000,
        });
    </script>
</body>

</html>