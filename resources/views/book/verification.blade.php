<x-default_layout :title="$title">
    <div class="flex justify-center items-center w-full h-screen bg-white">
        <div class="max-w-5xl text-black text-3xl font-medium text-center flex flex-col items-center mx-auto">
            <h1 class="mb-5">Scan Kode Qr Ini Ke Petugas</h1>
            {{ QrCode::size(300)->generate(url()->current()) }}
            <a class="rounded px-4 py-2 mt-2 text-xl" href="{{ url()->previous() }}">&laquo; Kembali</a>
        </div>
    </div>
</x-default_layout>