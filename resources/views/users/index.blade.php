@extends('layouts.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            margin-top: 20px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-semibold">👥 Manajemen User</h4>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-person-plus"></i> Tambah User
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success shadow-sm rounded">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm rounded">
            <div class="card-body p-0 rounded">
                <table class="table table-hover table-striped align-middle mb-0 rounded">
                    <!-- filepath: /home/zickkeen/code/pribadi/omtools/resources/views/users/index.blade.php -->
                    <thead class="bg-dark text-light rounded">
                        <tr>
                            <th class="ps-4">Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Verifikasi</th> <!-- Tambahkan kolom Verifikasi -->
                            <th>Terdaftar</th>
                            <th class="pe-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ $user->avatar_url ?? asset('/storage/avatars/default.png') }}"
                                            alt="avatar" width="32" height="32" class="rounded-circle">
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border border-secondary text-capitalize">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td>
                                    @if ($user->active)
                                        <span class="badge bg-success-subtle text-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->email_verified_at)
                                        <span class="badge bg-success-subtle text-success">Terverifikasi</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning">Belum Verifikasi</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td class="pe-4 text-end">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin hapus user ini?')" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
