<x-dashboard>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:username>{{ $username }}</x-slot:username>
    <x-slot:heading>{{ $heading }}</x-slot:heading>
    <div class="container-fluid">

        <!-- Page Heading -->
         <div class="d-flex justify-content-between align-items-center mb-3">
             <h1 class="h3 mb-2 text-gray-800">Data Akun</h1>
             <div class="d-flex">
                 <button class="btn btn-success mr-2" onclick="window.location.href='/admin/akun/create'">
                     <i class="fas fa-plus me-1"></i> Tambah Akun
                 </button>
                 <button class="btn btn-primary mr-2" onclick="window.location.href='/admin/akun/create'">
                     <i class="fas fa-plus"></i> Tambah Akun
                 </button>
                <button></button>
             </div>
         </div>
      
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Akun</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <tr>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Created at</th>
                            </tr>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account->username }}</td>
                                    <td>{{ $account->role }}</td>
                                    <td>{{ $account->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-dashboard>