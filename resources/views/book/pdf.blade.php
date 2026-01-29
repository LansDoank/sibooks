<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>
    <link rel="stylesheet" href="/css/sb-admin-2.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />

    <!-- Custom styles for this template-->

</head>

<body>

    <div class="card shadow mb-4 w-full">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buku</h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered max-w-6xl mx-auto" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Qr</th>
                            <th>Judul</th>
                            <th>Stok</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
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
                        </tr>
                    </tfoot>
                    <tbody>
                        <!-- {{ $no = 1 }} -->
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ QrCode::generate($book->qr_code) }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->stock }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>{{ $book->year}}</td>
                                    
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>