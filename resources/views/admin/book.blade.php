<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <div class="container-fluid px-0">

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">

            <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>

            <div class="d-flex flex-column flex-md-row gap-2">

                <button class="btn btn-success px-3" onclick="window.location.href='/admin/book/create'">
                    <i class="fas fa-plus me-1"></i> Tambah Buku
                </button>

                <button class="btn btn-danger d-flex align-items-center gap-2 px-3"
                    onclick="window.location.href='/admin/book/report/pdf'">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-file-pdf" viewBox="0 0 16 16">
                        <!-- svg -->
                    </svg>

                    Export PDF
                </button>

            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buku</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Qr</th>
                                <th>Judul</th>
                                <th>Tingkat</th>
                                <th>Stok</th>
                                <th>Penulis</th>
                                <th>Tahun</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Qr</th>
                                <th>Judul</th>
                                <th>Stok</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <!-- {{ $no = 1 }} -->
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ QrCode::generate($book->qr_code) }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>Kelas {{ $book->grade->name }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->year}}</td>
                                    <td class="text-start">
                                        <div class="d-flex flex-column flex-md-row justify-content-center gap-1 gap-md-2">
                                            <a href="/admin/book/edit/{{ $book->id }}"
                                                class="btn btn-sm btn-warning text-white">Edit</a>
                                            <a onclick="return confirm('Yakin?');" href="/admin/book/delete/{{ $book->id }}"
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
</x-dashboard>