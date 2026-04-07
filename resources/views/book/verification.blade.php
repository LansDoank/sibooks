<x-default_layout :title="$title">
    <div class="flex justify-center items-center w-full min-h-screen bg-white px-4">
        
        <div class="max-w-5xl w-full text-black text-center flex flex-col items-center mx-auto">
            
            <h1 class="mb-5 text-xl sm:text-2xl md:text-3xl font-medium">
                Scan Kode QR Ini Ke Petugas
            </h1>

            <div class="w-full flex justify-center">
                <div class="p-3 sm:p-4 bg-white rounded-xl shadow-md">
                    {{ QrCode::size(200)->generate(url('/') . '/admin/transaction/verification/' . $transaction->id) }}
                </div>
            </div>

            <a class="rounded px-4 py-2 mt-4 text-sm sm:text-base md:text-lg hover:underline"
                href="{{ url()->previous() }}">
                &laquo; Kembali
            </a>

        </div>

    </div>
</x-default_layout>