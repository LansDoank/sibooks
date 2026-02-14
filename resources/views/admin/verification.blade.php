<x-default_layout :title="$title">
    <div class="flex items-center max-w-lg mx-auto my-10 h-max">
        <form action="{{ '/admin/transaction/verification' . $transaction->id }}" method="POST" enctype="multipart/form-data"
            class="space-y-6 w-full">
            @csrf
            @method('PUT')

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Verifikasi Pengembalian/Peminjaman</h3>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Foto Kondisi Buku (Bukti Gambar)</label>

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" id="dropzone-label"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition relative overflow-hidden">

                            <div id="placeholder-content" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk ambil
                                        foto</span> atau drag and drop</p>
                                <p class="text-xs text-gray-400">PNG, JPG atau JPEG (Max. 2MB)</p>
                            </div>

                            <img id="admin-photo-preview" class="absolute inset-0 w-full h-full object-cover hidden" />

                            <input id="dropzone-file" name="proof_image" type="file" class="hidden" accept="image/*"
                                onchange="previewImage(event)" />
                        </label>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="kondisi_buku" class="block mb-2 text-sm font-medium text-gray-700">Update Kondisi
                        Fisik</label>
                    <select id="kondisi_buku" name="kondisi_buku"
                        class="w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="Mulus" {{ $transaction->kondisi_buku == 'Mulus' ? 'selected' : '' }}>Mulus</option>
                        <option value="Rusak Ringan" {{ $transaction->kondisi_buku == 'Rusak Ringan' ? 'selected' : '' }}>
                            Rusak Ringan</option>
                        <option value="Butuh Perbaikan" {{ $transaction->kondisi_buku == 'Butuh Perbaikan' ? 'selected' : '' }}>Butuh Perbaikan</option>
                    </select>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="flex-1 text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition">
                        Verifikasi Sekarang
                    </button>
                    <a href="/"
                        class="px-5 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
    </x-default-layout>