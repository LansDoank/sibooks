<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>
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
    <div id="pendaftaran" class="flex relative h-screen flex-col justify-center lg:justify-center items-center h-[712px] w-full">
        <form class="bg-white shadow border md:p-8 p-4 w-[280px] lg:w-[600px] rounded rounded-2xl" action="/user/login/"
            method="POST">
            @csrf
            <div class="flex justify-center">
                <img class="lg:w-24 w-20" src="/logo.png" alt="">
            </div>
            <div>
                <h1 class="text-center text-2xl md:text-3xl font-bold mb-5 lg:mb-10 font-['poppins']">Login</h1>
            </div>
            <ul>
                <li class="my-2">
                    <label for="name" class="font-medium text-xs lg:text-base font-['poppins']">Username</label>
                    <br>
                    <input id="name" placeholder="John Doe" name="username" class="border w-full my-2 px-2 py-2 h-9 md:h-10 rounded"
                        type="text">
                </li>
                <li class="my-2">
                    <label for="adress" class="font-medium text-xs lg:text-base font-['poppins']">Password</label>
                    <br>
                    <input id="adress" name="password" placeholder="*****" class="border w-full h-9 md:h-10 my-2 px-2 py-2 rounded"
                        type="password">
                </li>

                <li class="w-full flex justify-center flex flex-col flew-wrap">
                    <button type="submit"
                        class="w-full bg-blue-600 transition hover:bg-blue-500 text-sm lg:text-lg mt-3 px-8 py-2 text-white rounded-lg font-medium">Masuk</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>
