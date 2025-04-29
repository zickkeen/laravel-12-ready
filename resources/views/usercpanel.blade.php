@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2>Manajemen User cPanel</h2>
            <p class="text-muted">Total user: 1.203 • Total server: 12</p>
        </div>
    </div>

    <!-- Filter dan Search -->
    <div class="row mb-3">
        <div class="col-md-4 mb-2">
            <input type="text" class="form-control" placeholder="Cari user / domain / email...">
        </div>
        <div class="col-md-4 mb-2">
            <select class="form-select">
                <option value="">Semua Server</option>
                <option value="srv1">srv1.example.com</option>
                <option value="srv2">srv2.example.com</option>
                <option value="srv3">srv3.example.com</option>
                <!-- More servers -->
            </select>
        </div>
        <div class="col-md-4 mb-2 text-end">
            <button class="btn btn-outline-primary">Refresh</button>
        </div>
    </div>

    <!-- Tabel User -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>User</th>
                            <th>Domain</th>
                            <th>Server</th>
                            <th>Quota</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>user123</td>
                            <td>example.com</td>
                            <td>srv1.example.com</td>
                            <td>800MB / 1GB</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                            <td>admin@example.com</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-warning">Suspend</button>
                                    <button class="btn btn-secondary">Reset</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>siteku</td>
                            <td>siteku.id</td>
                            <td>srv2.example.com</td>
                            <td>2GB / 5GB</td>
                            <td><span class="badge bg-danger">Suspend</span></td>
                            <td>info@siteku.id</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-success">Unsuspend</button>
                                    <button class="btn btn-secondary">Reset</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <!-- More rows here -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between p-3">
                <div class="text-muted">Menampilkan 1-10 dari 1.203 user</div>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><span class="page-link">Prev</span></li>
                        <li class="page-item active"><span class="page-link">1</span></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>
@endsection
