@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>
                <h2 class="fw-bold admin-title mb-1">
                    <i class="bi bi-people-fill me-2"></i>
                    Data User
                </h2>

                <p class="text-muted mb-0">
                    Kelola seluruh data pengguna Coffee Finder
                </p>
            </div>

        </div>

        <!-- ALERT -->
        @if(session('success'))

            <div class="alert alert-success border-0 shadow-sm rounded-4 px-4 py-3 mb-4">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>

        @endif

        <!-- CARD -->
        <div class="card admin-card border-0 shadow-lg">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table align-middle mb-0 admin-table">

                        <!-- TABLE HEAD -->
                        <thead class="table-header">

                            <tr>

                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Tanggal Dibuat</th>
                                <th class="text-center" width="120">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <!-- TABLE BODY -->
                        <tbody>

                            @forelse($users as $user)

                                <tr>

                                    <!-- NAMA -->
                                    <td>

                                        <div class="user-name">
                                            <i class="bi bi-person-circle me-2"></i>
                                            {{ $user->name }}
                                        </div>

                                    </td>

                                    <!-- EMAIL -->
                                    <td>

                                        <div class="email-text">
                                            {{ $user->email }}
                                        </div>

                                    </td>

                                    <!-- ROLE -->
                                    <td>

                                        @if($user->role == 'admin')

                                            <span class="badge role-admin">

                                                <i class="bi bi-shield-lock-fill me-1"></i>
                                                Admin

                                            </span>

                                        @else

                                            <span class="badge role-user">

                                                <i class="bi bi-person-fill me-1"></i>
                                                User

                                            </span>

                                        @endif

                                    </td>

                                    <!-- TANGGAL -->
                                    <td>

                                        <div class="date-text">

                                            {{ optional($user->created_at)->format('d M Y') }}

                                        </div>

                                    </td>

                                    <!-- AKSI -->
                                    <td>

                                        <div class="d-flex justify-content-center">

                                            <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-delete btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">

                                                <i class="bi bi-trash-fill"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5">

                                        <div class="empty-state text-center py-5">

                                            <i class="bi bi-people fs-1 text-muted"></i>

                                            <h5 class="fw-bold mt-3 admin-title">
                                                Data User Belum Tersedia
                                            </h5>

                                            <p class="text-muted mb-0">
                                                Belum ada pengguna yang terdaftar
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <!-- STYLE -->
    <style>
        body {
            background:
                linear-gradient(rgba(245, 241, 234, 0.95),
                    rgba(245, 241, 234, 0.95)),
                url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085');

            background-size: cover;
            background-attachment: fixed;
        }

        /* TITLE */
        .admin-title {
            color: #4b2e2e;
        }

        /* CARD */
        .admin-card {
            border-radius: 24px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
        }

        /* TABLE */
        .admin-table {
            min-width: 900px;
        }

        .table-header {
            background: linear-gradient(135deg, #4b2e2e, #6f4e37) !important;
        }

        .table-header th {
            color: #ffffff !important;
            font-weight: 700;
            font-size: 14px;
            padding: 20px 18px !important;
            border: none !important;
            white-space: nowrap;
            vertical-align: middle;
            background: transparent !important;
        }

        /* BODY */
        .admin-table tbody td {
            padding: 20px 18px;
            vertical-align: middle;
            border-color: #f1f1f1;
            background: #fff;
        }

        .admin-table tbody tr {
            transition: 0.3s;
        }

        .admin-table tbody tr:hover {
            background: #f8f4f1;
        }

        .admin-table tbody tr:hover td {
            background: #f8f4f1;
        }

        /* USER */
        .user-name {
            font-size: 15px;
            font-weight: 700;
            color: #4b2e2e;
        }

        /* EMAIL */
        .email-text {
            color: #6c757d;
            font-weight: 500;
        }

        /* DATE */
        .date-text {
            color: #198754;
            font-weight: 700;
            white-space: nowrap;
        }

        /* ROLE */
        .role-admin {
            background: rgba(220, 53, 69, 0.15);
            color: #dc3545;

            padding: 10px 16px;
            border-radius: 30px;

            font-size: 12px;
            font-weight: 700;
        }

        .role-user {
            background: rgba(13, 110, 253, 0.15);
            color: #0d6efd;

            padding: 10px 16px;
            border-radius: 30px;

            font-size: 12px;
            font-weight: 700;
        }

        /* DELETE BUTTON */
        .btn-delete {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: none;
            border-radius: 12px;

            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #bb2d3b;
            color: white;
        }

        /* EMPTY */
        .empty-state {
            min-height: 320px;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* MOBILE */
        @media(max-width:768px) {

            .container {
                padding-left: 12px;
                padding-right: 12px;
            }

            .admin-card {
                border-radius: 20px;
            }

            .admin-table {
                min-width: 800px;
            }

        }
    </style>

@endsection