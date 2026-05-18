@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

            <div>
                <h2 class="fw-bold text-coffee mb-1">
                    <i class="bi bi-cup-hot-fill me-2"></i>
                    Coffee Shop Finder
                </h2>

                <p class="text-muted mb-0">
                    Temukan coffee shop terbaik dengan suasana ternyaman
                </p>
            </div>

        </div>

        <!-- FILTER -->
        <div class="card border-0 shadow-lg rounded-5 filter-card mb-5">

            <div class="card-body p-4">

                <form method="GET" class="row g-3 align-items-center">

                    <!-- SEARCH -->
                    <div class="col-lg-5">

                        <label class="form-label fw-semibold text-coffee">
                            Cari Coffee Shop
                        </label>

                        <div class="input-group">

                            <span class="input-group-text search-icon border-0">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="text" name="search" class="form-control custom-input"
                                placeholder="Cari nama coffee shop..." value="{{ request('search') }}">

                        </div>

                    </div>

                    <!-- KATEGORI -->
                    <div class="col-lg-4">

                        <label class="form-label fw-semibold text-coffee">
                            Kategori
                        </label>

                        <select name="kategori" class="form-select custom-input">

                            <option value="">Semua Kategori</option>

                            <option value="nongkrong" {{ request('kategori') == 'nongkrong' ? 'selected' : '' }}>
                                Nongkrong
                            </option>

                            <option value="work" {{ request('kategori') == 'work' ? 'selected' : '' }}>
                                Work / Remote Work
                            </option>

                            <option value="keluarga" {{ request('kategori') == 'keluarga' ? 'selected' : '' }}>
                                Keluarga
                            </option>

                            <option value="instagramable" {{ request('kategori') == 'instagramable' ? 'selected' : '' }}>
                                Instagramable
                            </option>

                            <option value="belajar" {{ request('kategori') == 'belajar' ? 'selected' : '' }}>
                                Belajar / Reading
                            </option>

                            <option value="outdoor" {{ request('kategori') == 'outdoor' ? 'selected' : '' }}>
                                Outdoor / Garden
                            </option>

                            <option value="chill" {{ request('kategori') == 'chill' ? 'selected' : '' }}>
                                Chill / Santai
                            </option>

                        </select>

                    </div>

                    <!-- BUTTON -->
                    <div class="col-lg-3 d-grid">

                        <label class="form-label opacity-0">
                            Button
                        </label>

                        <button class="btn btn-coffee rounded-4">

                            <i class="bi bi-funnel-fill me-2"></i>
                            Terapkan Filter

                        </button>

                    </div>

                </form>

            </div>

        </div>

        <!-- LIST CARD -->
        <div class="row g-4">

            @forelse($coffeeShops as $coffee)

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">

                    <div class="card coffee-card border-0 h-100">

                        <!-- IMAGE -->
                        <div class="coffee-image-wrapper">

                            <img src="{{ $coffee->foto
                ? asset('storage/' . $coffee->foto)
                : 'https://source.unsplash.com/600x400/?coffee-shop' }}" class="coffee-image"
                                alt="{{ $coffee->nama }}">

                            <!-- OVERLAY -->
                            <div class="coffee-overlay"></div>

                            <!-- CATEGORY -->
                            <div class="position-absolute top-0 end-0 p-3">

                                <span class="badge category-badge">

                                    <i class="bi bi-tag-fill me-1"></i>
                                    {{ ucfirst($coffee->kategori) }}

                                </span>

                            </div>

                        </div>

                        <!-- BODY -->
                        <div class="card-body p-4 d-flex flex-column">

                            <!-- TITLE -->
                            <h4 class="fw-bold text-coffee mb-2">
                                {{ $coffee->nama }}
                            </h4>

                            <!-- ADDRESS -->
                            <div class="d-flex align-items-start text-muted small mb-3">

                                <i class="bi bi-geo-alt-fill text-danger me-2 mt-1"></i>

                                <span>
                                    {{ $coffee->alamat }}
                                </span>

                            </div>

                            <!-- INFO -->
                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <!-- RATING -->
                                <div class="rating-box">

                                    <i class="bi bi-star-fill text-warning me-1"></i>

                                    <span class="fw-semibold">
                                        {{ number_format($coffee->reviews->avg('rating') ?? 4.5, 1) }}
                                    </span>

                                </div>

                                <!-- SUASANA -->
                                <span class="suasana-badge">

                                    <i class="bi bi-cup-straw me-1"></i>
                                    {{ $coffee->suasana }}

                                </span>

                            </div>

                            <!-- PRICE -->
                            <div class="price-box mb-4">

                                <div class="small text-muted mb-1">
                                    Kisaran Harga
                                </div>

                                <div class="fw-bold text-success fs-5">

                                    Rp {{ number_format($coffee->harga_min) }}
                                    -
                                    {{ number_format($coffee->harga_max) }}

                                </div>

                            </div>

                            <!-- BUTTON -->
                            <div class="mt-auto">

                                <a href="{{ route('user.detail', $coffee->id) }}" class="btn btn-detail w-100 rounded-4">

                                    <i class="bi bi-eye-fill me-2"></i>
                                    Lihat Detail

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="card border-0 shadow-lg rounded-5">

                        <div class="card-body text-center py-5">

                            <i class="bi bi-search display-3 text-muted"></i>

                            <h4 class="fw-bold mt-3 text-coffee">
                                Data Coffee Shop Tidak Ditemukan
                            </h4>

                            <p class="text-muted mb-0">
                                Coba gunakan kata kunci lain atau ubah filter pencarian
                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

    <!-- CUSTOM STYLE -->
    <style>
        body {
            background:
                linear-gradient(rgba(245, 241, 234, 0.95),
                    rgba(245, 241, 234, 0.95)),
                url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085');

            background-size: cover;
            background-attachment: fixed;
        }

        /* TEXT */
        .text-coffee {
            color: #4b2e2e;
        }

        /* FILTER */
        .filter-card {
            background: rgba(255, 255, 255, 0.92);

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.08);
        }

        /* INPUT */
        .custom-input {
            border: none;
            border-radius: 16px !important;

            padding: 14px 18px;

            background: #f8f5f2;

            transition: 0.3s;
        }

        .custom-input:focus {
            background: white;

            box-shadow:
                0 0 0 0.2rem rgba(111, 78, 55, 0.15);
        }

        .search-icon {
            background: #6f4e37;
            color: white;

            border-radius: 16px 0 0 16px !important;
            padding: 0 18px;
        }

        /* BUTTON */
        .btn-coffee {
            background: linear-gradient(135deg, #6f4e37, #8b5e3c);

            color: white;
            border: none;

            padding: 14px;
            font-weight: 600;

            transition: 0.3s;
        }

        .btn-coffee:hover {
            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(111, 78, 55, 0.25);
        }

        /* CARD */
        .coffee-card {
            border-radius: 28px;
            overflow: hidden;

            background: #ffffff;

            transition: 0.4s ease;

            box-shadow:
                0 12px 35px rgba(0, 0, 0, 0.10);
        }

        .coffee-card:hover {
            transform: translateY(-8px);

            box-shadow:
                0 20px 45px rgba(0, 0, 0, 0.18);
        }

        /* IMAGE */
        .coffee-image-wrapper {
            position: relative;
            overflow: hidden;

            height: 260px;

            background: transparent;
        }

        .coffee-image {
            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: center;

            display: block;

            transition: transform 0.6s ease;
        }

        .coffee-card:hover .coffee-image {
            transform: scale(1.06);
        }

        /* OVERLAY */
        .coffee-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(to top,
                    rgba(0, 0, 0, 0.55) 0%,
                    rgba(0, 0, 0, 0.15) 45%,
                    rgba(0, 0, 0, 0.00) 100%);
        }

        /* CATEGORY */
        .category-badge {
            background: rgba(255, 255, 255, 0.95);

            color: #4b2e2e;

            padding: 8px 14px;

            border-radius: 50px;

            font-size: 12px;
            font-weight: 700;

            border: none;

            box-shadow:
                0 5px 15px rgba(0, 0, 0, 0.12);
        }

        /* SUASANA */
        .suasana-badge {
            background: #f5f1ea;
            color: #6f4e37;

            padding: 8px 14px;

            border-radius: 30px;

            font-size: 13px;
            font-weight: 600;
        }

        /* RATING */
        .rating-box {
            display: flex;
            align-items: center;

            background: #fff8e7;

            padding: 8px 14px;

            border-radius: 30px;
        }

        /* PRICE */
        .price-box {
            background: #f9f9f9;

            padding: 18px;

            border-radius: 20px;

            border: 1px solid #f1f1f1;
        }

        /* DETAIL BUTTON */
        .btn-detail {
            background: linear-gradient(135deg, #4b2e2e, #6f4e37);

            color: white;
            border: none;

            padding: 14px;

            font-weight: 600;

            transition: 0.3s;
        }

        .btn-detail:hover {
            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 12px 22px rgba(0, 0, 0, 0.15);
        }
    </style>

@endsection