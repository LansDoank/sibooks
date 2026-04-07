<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <div class="container-fluid px-0">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
            <h1 class="h3 mb-2 text-gray-800">Data Rak Buku</h1>
            <div class="d-flex flex-column flex-md-row gap-2">
                <button class="btn btn-success mr-2" onclick="window.location.href='/admin/rack/create'">
                    <i class="fas fa-plus me-1"></i> Tambah Rak
                </button>
                <button onclick="bukaPeta()" class="btn btn-primary mr-2">
                    Liat Denah
                </button>
                <button onclick="window.location.href = '/admin/rack/map/edit'" class="btn btn-warning mr-2">
                    Ganti Denah
                </button>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rak Buku</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Qr</th>
                                <th>Nama Rak</th>
                                <th>Kategori</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Qr</th>
                                <th>Nama Rak</th>
                                <th>Kategori</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <!-- {{ $no = 1 }} -->
                            @foreach ($racks as $rack)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ QrCode::generate($rack->qr_code) }}</td>
                                    <td>{{ $rack->name }}</td>
                                    <td>{{ $rack->category}}</td>
                                    <td class="text-start">
                                        <div class="d-flex flex-column flex-md-row justify-content-center gap-1 gap-md-2">
                                            <a href="/admin/rack/edit/{{ $rack->id }}"
                                                class="btn btn-sm btn-warning text-white">Edit</a>
                                            <a onclick="return confirm('Yakin?');" href="/admin/rack/delete/{{ $rack->id }}"
                                                class="btn btn-sm btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div id="modalPeta" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75" onclick="tutupModal()"></div>

            <div
                class="inline-block  overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4 ">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900">Lokasi Buku di Perpustakaan</h3>
                        <button onclick="tutupModal()"
                            class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                    </div>

                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 bg-gray-50">
                        <div class="w-full">
                            {!! file_get_contents(storage_path('app/public/img/denah-perpus.svg')) !!}
                        </div>
                    </div>

                    <p class="mt-4 text-sm text-gray-500 italic">
                        *Rak yang berwarna kuning adalah lokasi buku yang Anda cari.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function bukaPeta(rakId) {
            const modal = document.getElementById('modalPeta');
            modal.classList.remove('hidden');
        }

        function tutupModal() {
            const modal = document.getElementById('modalPeta');
            modal.classList.add('hidden');
        }

        // Tutup modal dengan tombol Esc
        window.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                tutupModal();
            }
        });
        function highlightRak(idRakYangDicari) {
            // 1. Tentukan warna
            const warnaDefault = "#8B4513"; // Cokelat
            const warnaHighlight = "#FFFF00"; // Kuning

            // 2. Ambil semua elemen rak (misalnya semua 'rect' di dalam SVG)
            const semuaRak = document.querySelectorAll('#denah-perpustakaan rect');

            // 3. Reset semua rak ke warna cokelat
            semuaRak.forEach(rak => {
                rak.style.fill = warnaDefault;
            });

            // 4. Cari rak yang spesifik dan ubah warnanya menjadi kuning
            const rakTarget = document.getElementById(idRakYangDicari);
            if (rakTarget) {
                rakTarget.style.fill = warnaHighlight;
            }
        }

        // Gabungkan logicnya seperti ini:
        async function inisialisasiBuku() {
            const pathArray = window.location.pathname.split('/');
            const slug = pathArray[pathArray.length - 1];

            try {
                const response = await fetch(`http://localhost:8000/api/book/${slug}`);
                const buku = await response.json();

                if (buku) {
                    highlightRak(buku.rack.name);
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }

        // Jalankan fungsi saat halaman selesai loading
        window.onload = inisialisasiBuku;
    </script>
</x-dashboard>