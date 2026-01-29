<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-2 text-gray-800">Data Kelas</h1>
            <div class="d-flex">
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
                                        <div class="flex justify-center  gap-2">
                                            <a href="/admin/class/edit/{{ $class->id }}"
                                                class="bg-yellow-400 hover:bg-yellow-500 px-3 py-1 rounded text-white text-decoration-none">Edit</a>
                                            <a onclick="return confirm('Yakin?');"
                                                href="/admin/class/delete/{{ $class->id }}"
                                                class="bg-red-400 text-decoration-none hover:bg-red-500 px-3 py-1 rounded text-white">Delete</a>
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