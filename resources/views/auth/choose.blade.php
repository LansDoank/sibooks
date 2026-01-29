<x-default_layout :title="$title">
    @if (session('success'))
        <script>
            alert({{session('success')}})
        </script>
    @endif
    <form action="/user/login" method="POST">
        @csrf
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2" src="/img/logo-almadani.png" alt="logo">
                    SiBooks
                </a>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Masuk sebagai
                        </h1>
                        <div class="flex flex-col gap-4">

                                <a href="/user/login"
                                    class="w-full text-white bg-blue-600 transition hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Siswa</a>
                                <a href="/admin/login"
                                    class="w-full text-white bg-red-600 transition hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Admin</a>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</x-default_layout>