<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <div class="container-fluid">

        @if (Session::get('success'))
            <div class="bg-green-100 rounded px-4 py-2 my-3 text-green-500 border !border-green-300">
                <p>{{  Session::get('success')}} 👍</p>
            </div>
        @elseif(Session::get('error'))
            <div class="bg-green-100 rounded px-4 py-2 my-3 text-green-500 border !border-green-300">
                <p>{{  Session::get('success')}} 👍</p>
            </div>
        @endif

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-2 text-gray-800">Data Akun</h1>
            <div class="d-flex">
                <button class="btn btn-success mr-2" onclick="window.location.href='/admin/user/create'">
                    <i class="fas fa-plus me-1"></i> Tambah Akun
                </button>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Akun</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered text-start table-auto" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <!-- {{ $no = 1 }} -->
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td class="text-start">{{ $account->fullname }}</td>
                                    <td class="text-start">{{ $account->email }}</td>
                                    <td class="text-start">{{ $account->role->name }}</td>
                                    <td class="text-start">{{ $account->created_at->diffForHumans() }}</td>
                                    <td class="text-start">
                                        <div class="flex justify-center  gap-2">
                                            <a href="/admin/user/edit/{{ $account->id }}"
                                                class="bg-yellow-400 hover:bg-yellow-500 px-3 py-1 rounded text-white text-decoration-none">Edit</a>
                                            <a onclick="return confirm('Yakin?');"
                                                href="/admin/user/delete/{{ $account->id }}"
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