<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <div class="container-fluid px-0">

        <!-- Page Heading -->
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
            <h1 class="h3 mb-2 text-gray-800">Data Kelas</h1>
            <div class="d-flex flex-column flex-md-row gap-2">
                <button class="btn btn-success mr-2" onclick="window.location.href='/admin/class/create'">
                    <i class="fas fa-plus me-1"></i> Tambah Kelas
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
                                <th class="w-12">No</th>
                                <th>Nama Kelas</th>
                                <th class="w-48">Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <!-- {{ $no = 1 }} -->

                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $class->name }}</td>
                                    <td class="text-start">
                                        <div class="d-flex flex-column flex-md-row justify-content-center gap-1 gap-md-2">
                                            <a href="/admin/class/edit/{{ $class->id }}"
                                                class="btn btn-sm btn-warning text-white">Edit</a>
                                            <a onclick="return confirm('Yakin?');"
                                                href="/admin/class/delete/{{ $class->id }}"
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