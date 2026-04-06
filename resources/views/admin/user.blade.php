<x-dashboard :title="$title" :fullname="$fullname" :heading="$heading" :user="$user">
    <div class="container-fluid px-0">

        @if (Session::get('success'))
            <div class="bg-green-100 rounded px-4 py-2 my-3 text-green-500 border !border-green-300">
                <p>{{  Session::get('success')}} 👍</p>
            </div>
        @elseif(Session::get('error'))
            <div class="bg-green-100 rounded px-4 py-2 my-3 text-green-500 border !border-green-300">
                <p>{{  Session::get('success')}} 👍</p>
            </div>
        @endif

        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

            <h1 class="h3 mb-2 mb-md-0 text-gray-800">Data Siswa</h1>

            <button class="btn btn-success px-3" onclick="window.location.href='/admin/user/create'">
                <i class="fas fa-plus me-1"></i> Tambah Akun
            </button>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Akun</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered text-start table-auto text-nowrap" width="100%"
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
                                        <div class="d-flex flex-column flex-md-row justify-content-center gap-1 gap-md-2">
                                            <a href="/admin/user/edit/{{ $account->id }}"
                                                class="btn btn-sm btn-warning text-white">Edit</a>

                                            <a onclick="return confirm('Yakin?');"
                                                href="/admin/user/delete/{{ $account->id }}"
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