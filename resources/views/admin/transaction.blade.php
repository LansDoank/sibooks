<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buku</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto Peminjam</th>
                                <th>Kelas Peminjam</th>
                                <th>Nama Buku</th>
                                <th>Jumlah Buku</th>
                                <th>Waktu Pinjam</th>
                                <th>Waktu Pengembalian</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Foto Peminjam</th>
                                <th>Kelas Peminjam</th>
                                <th>Nama Buku</th>
                                <th>Jumlah Buku</th>
                                <th>Waktu Pinjam</th>
                                <th>Waktu Pengembalian</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td><img src="{{ $transaction->borrower_image }}" alt=""></td>
                                    <td>{{ $transaction->kelas_peminjam }}</td>
                                    <td>{{ $transaction->book->title }}</td>
                                    <td>{{ $transaction->jumlah_buku }}</td>
                                    <td>{{ $transaction->borrow_time}}</td>
                                    <td>{{ $transaction->return_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-dashboard>