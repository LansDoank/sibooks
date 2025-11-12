<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Kelas</h1>

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
                                <th>Nama Kelas</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <!-- {{ $no = 1 }} -->

                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $class->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-dashboard>