@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>
                <h2 class="fw-bold admin-title mb-1">
                    <i class="bi bi-cup-hot-fill me-2"></i>
                    Data Coffee Shop
                </h2>

                <p class="text-muted mb-0">
                    Kelola seluruh data coffee shop dengan tampilan modern
                </p>
            </div>

            <a href="{{ route('coffee.create') }}" class="btn btn-add shadow-sm">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Tambah Coffee Shop
            </a>

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

                                <th width="130">Foto</th>
                                <th>Nama Coffee Shop</th>
                                <th>Alamat</th>
                                <th>Kategori</th>
                                <th>Suasana</th>
                                <th>Harga</th>
                                <th>Menu</th>
                                <th>Instagram</th>
                                <th class="text-center" width="120">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <!-- TABLE BODY -->
                        <tbody>

                            @forelse($coffeeShops as $coffee)

                                <tr>

                                    <!-- FOTO -->
                                    <td>

                                        @if($coffee->foto)

                                            <img src="{{ asset('storage/' . $coffee->foto) }}" alt="{{ $coffee->nama }}"
                                                class="coffee-image" onerror="this.src='https://placehold.co/120x90?text=No+Image'">

                                        @else

                                            <img src="https://placehold.co/120x90?text=No+Image" class="coffee-image">

                                        @endif

                                    </td>

                                    <!-- NAMA -->
                                    <td>

                                        <div class="coffee-name">
                                            {{ $coffee->nama }}
                                        </div>

                                    </td>

                                    <!-- ALAMAT -->
                                    <td class="alamat-col">

                                        <div class="alamat-box">

                                            <i class="bi bi-geo-alt-fill text-danger me-2 mt-1"></i>

                                            <span>
                                                {{ $coffee->alamat }}
                                            </span>

                                        </div>

                                    </td>

                                    <!-- KATEGORI -->
                                    <td>

                                        <span class="badge category-badge">

                                            <i class="bi bi-tag-fill me-1"></i>

                                            {{ ucfirst($coffee->kategori) }}

                                        </span>

                                    </td>

                                    <!-- SUASANA -->
                                    <td>

                                        <span class="suasana-badge">

                                            <i class="bi bi-cup-hot-fill me-1"></i>

                                            {{ $coffee->suasana }}

                                        </span>

                                    </td>

                                    <!-- HARGA -->
                                    <td>

                                        <div class="price-text">

                                            Rp {{ number_format($coffee->harga_min) }}
                                            -
                                            {{ number_format($coffee->harga_max) }}

                                        </div>

                                    </td>

                                    <!-- MENU -->
                                    <td>

                                        @if($coffee->menu_link)

                                            <a href="{{ $coffee->menu_link }}" target="_blank" class="btn btn-menu btn-sm">

                                                <i class="bi bi-journal-text me-1"></i>
                                                Menu

                                            </a>

                                        @else

                                            <span class="text-muted">-</span>

                                        @endif

                                    </td>

                                    <!-- INSTAGRAM -->
                                    <td>

                                        @if($coffee->sosmed_instagram)

                                            <a href="{{ $coffee->sosmed_instagram }}" target="_blank"
                                                class="btn btn-instagram btn-sm">

                                                <i class="bi bi-instagram me-1"></i>
                                                Instagram

                                            </a>

                                        @else

                                            <span class="text-muted">-</span>

                                        @endif

                                    </td>

                                    <!-- AKSI -->
                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            <!-- EDIT -->
                                            <a href="{{ route('coffee.edit', $coffee->id) }}" class="btn btn-edit btn-sm">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>

                                            <!-- DELETE -->
                                            <a href="{{ route('coffee.delete', $coffee->id) }}" class="btn btn-delete btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">

                                                <i class="bi bi-trash-fill"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="9">

                                        <div class="empty-state text-center py-5">

                                            <i class="bi bi-search fs-1 text-muted"></i>

                                            <h5 class="fw-bold mt-3 admin-title">
                                                Data Coffee Shop Belum Tersedia
                                            </h5>

                                            <p class="text-muted mb-0">
                                                Silakan tambahkan coffee shop baru terlebih dahulu
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
            min-width: 1200px;
        }

        /* FIX HEADER YANG TIDAK MUNCUL */
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

        /* IMAGE */
        .coffee-image {
            width: 110px;
            height: 85px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transition: 0.3s;
        }

        .coffee-image:hover {
            transform: scale(1.04);
        }

        /* NAME */
        .coffee-name {
            font-size: 15px;
            font-weight: 700;
            color: #4b2e2e;
            min-width: 180px;
        }

        /* ALAMAT */
        .alamat-col {
            min-width: 260px;
        }

        .alamat-box {
            display: flex;
            align-items: flex-start;
            color: #6c757d;
            line-height: 1.5;
        }

        /* BADGE */
        .category-badge {
            background: rgba(255, 193, 7, 0.15);
            color: #856404;

            padding: 10px 16px;
            border-radius: 30px;

            font-size: 12px;
            font-weight: 700;
        }

        .suasana-badge {
            background: #f5f1ea;
            color: #6f4e37;

            padding: 10px 16px;
            border-radius: 30px;

            font-size: 12px;
            font-weight: 600;
        }

        /* PRICE */
        .price-text {
            color: #198754;
            font-weight: 700;
            white-space: nowrap;
        }

        /* BUTTON */
        .btn-add {
            background: linear-gradient(135deg, #6f4e37, #8b5e3c);
            color: white;
            border: none;

            padding: 12px 22px;
            border-radius: 14px;

            font-weight: 600;
            transition: 0.3s;
        }

        .btn-add:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(111, 78, 55, 0.25);
        }

        .btn-menu {
            background: #198754;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 8px 14px;
        }

        .btn-menu:hover {
            background: #157347;
            color: white;
        }

        .btn-instagram {
            background: linear-gradient(135deg,
                    #833ab4,
                    #fd1d1d,
                    #fcb045);

            color: white;
            border: none;
            border-radius: 30px;
            padding: 8px 14px;
        }

        .btn-instagram:hover {
            color: white;
            opacity: 0.92;
        }

        /* ACTION BUTTON */
        .btn-edit,
        .btn-delete {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: none;
            border-radius: 12px;

            color: white;
        }

        .btn-edit {
            background: #0d6efd;
        }

        .btn-edit:hover {
            background: #0b5ed7;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
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
                min-width: 1000px;
            }

        }
    </style>

@endsection