@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <!-- BACK BUTTON -->
        <div class="mb-4">

            <a href="{{ route('home') }}" class="btn btn-coffee">

                <i class="bi bi-arrow-left me-2"></i>
                Kembali ke Home

            </a>

        </div>

        <!-- DETAIL CARD -->
        <div class="card detail-card border-0 overflow-hidden mb-4">

            <!-- IMAGE -->
            <div class="detail-image-wrapper">

                <img src="{{ $coffee->foto
        ? asset('storage/' . $coffee->foto)
        : 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1400&auto=format&fit=crop' }}"
                    class="detail-image" alt="{{ $coffee->nama }}">

                <!-- OVERLAY -->
                <div class="detail-overlay"></div>

                <!-- CONTENT ON IMAGE -->
                <div class="detail-image-content">

                    <span class="category-badge mb-3">

                        <i class="bi bi-tag-fill me-1"></i>
                        {{ ucfirst($coffee->kategori) }}

                    </span>

                    <h1 class="detail-title">
                        {{ $coffee->nama }}
                    </h1>

                    <div class="detail-location">

                        <i class="bi bi-geo-alt-fill me-2"></i>

                        <span>
                            {{ $coffee->alamat }}
                        </span>

                    </div>

                </div>

            </div>

            <!-- BODY -->
            <div class="card-body p-4 p-lg-5">

                <!-- INFO -->
                <div class="row g-4 mb-4">

                    <!-- SUASANA -->
                    <div class="col-md-4">

                        <div class="info-box">

                            <div class="info-icon bg-light-brown">

                                <i class="bi bi-cup-hot-fill"></i>

                            </div>

                            <div>

                                <small class="text-muted d-block mb-1">
                                    Suasana
                                </small>

                                <div class="fw-bold text-coffee">
                                    {{ $coffee->suasana }}
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- HARGA -->
                    <div class="col-md-4">

                        <div class="info-box">

                            <div class="info-icon bg-light-green">

                                <i class="bi bi-cash-stack"></i>

                            </div>

                            <div>

                                <small class="text-muted d-block mb-1">
                                    Kisaran Harga
                                </small>

                                <div class="fw-bold text-success">

                                    Rp {{ number_format($coffee->harga_min) }}
                                    -
                                    {{ number_format($coffee->harga_max) }}

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- RATING -->
                    <div class="col-md-4">

                        <div class="info-box">

                            <div class="info-icon bg-light-yellow">

                                <i class="bi bi-star-fill"></i>

                            </div>

                            <div>

                                <small class="text-muted d-block mb-1">
                                    Rating
                                </small>

                                <div class="fw-bold text-warning">

                                    {{ number_format($coffee->reviews->avg('rating') ?? 0, 1) }}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- BUTTONS -->
                <div class="d-flex flex-wrap gap-3 mb-5">

                    @if($coffee->menu_link)

                        <a href="{{ $coffee->menu_link }}" target="_blank" class="btn btn-menu">

                            <i class="bi bi-journal-text me-2"></i>
                            Lihat Menu

                        </a>

                    @endif

                    @if($coffee->sosmed_instagram)

                        <a href="{{ $coffee->sosmed_instagram }}" target="_blank" class="btn btn-instagram">

                            <i class="bi bi-instagram me-2"></i>
                            Instagram

                        </a>

                    @endif

                    @if($coffee->latitude && $coffee->longitude)

                        <a href="https://www.google.com/maps?q={{ $coffee->latitude }},{{ $coffee->longitude }}" target="_blank"
                            class="btn btn-maps">

                            <i class="bi bi-geo-alt-fill me-2"></i>
                            Buka di Google Maps

                        </a>

                    @endif

                </div>

                <!-- DESCRIPTION -->
                <div class="description-box">

                    <h4 class="fw-bold text-coffee mb-3">

                        <i class="bi bi-card-text me-2"></i>
                        Deskripsi

                    </h4>

                    <p class="text-secondary mb-0 lh-lg">

                        {{ $coffee->deskripsi ?? 'Belum ada deskripsi.' }}

                    </p>

                </div>

            </div>

        </div>

        <!-- MAP -->
        <div class="card detail-card border-0 mb-4">

            <div class="card-body p-4">

                <h4 class="fw-bold text-coffee mb-4">

                    <i class="bi bi-map me-2"></i>
                    Lokasi Coffee Shop

                </h4>

                @if($coffee->latitude && $coffee->longitude)

                    <div id="map" class="map-box"></div>

                @else

                    <div class="alert alert-warning rounded-4 mb-0">
                        Lokasi belum tersedia.
                    </div>

                @endif

            </div>

        </div>

        <!-- REVIEW -->
        <div class="card detail-card border-0 mt-4">

            <div class="card-body p-4">

                <h4 class="fw-bold text-coffee mb-4">

                    <i class="bi bi-chat-square-text-fill me-2"></i>
                    Review Pengunjung

                </h4>

                <!-- FORM REVIEW -->
                @auth

                    <form action="{{ route('review.store', $coffee->id) }}" method="POST">

                        @csrf

                        <!-- RATING -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Rating
                            </label>

                            <select name="rating" class="form-select rounded-4" required>

                                <option value="">
                                    Pilih Rating
                                </option>

                                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                                <option value="4">⭐⭐⭐⭐ (4)</option>
                                <option value="3">⭐⭐⭐ (3)</option>
                                <option value="2">⭐⭐ (2)</option>
                                <option value="1">⭐ (1)</option>

                            </select>

                        </div>

                        <!-- KOMENTAR -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Komentar
                            </label>

                            <textarea name="komentar" rows="4" class="form-control rounded-4"
                                placeholder="Tulis pengalaman kamu..." required></textarea>

                        </div>

                        <button type="submit" class="btn btn-coffee">

                            <i class="bi bi-send-fill me-2"></i>
                            Kirim Review

                        </button>

                    </form>

                @else

                    <div class="alert alert-warning rounded-4">
                        Silakan login terlebih dahulu untuk memberikan review.
                    </div>

                @endauth

                <!-- LIST REVIEW -->
                <div class="mt-5">

                    @forelse($coffee->reviews as $review)

                        <div class="review-card mb-3">

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="fw-bold text-coffee">

                                    <i class="bi bi-person-circle me-2"></i>
                                    {{ $review->user->name }}

                                </div>

                                <span class="review-rating">

                                    ⭐ {{ $review->rating }}

                                </span>

                            </div>

                            <p class="text-muted mt-3 mb-0">

                                {{ $review->komentar }}

                            </p>

                        </div>

                    @empty

                        <div class="alert alert-light rounded-4">
                            Belum ada review.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>
        <!-- STYLE -->
        <style>
            body {
                background:
                    linear-gradient(rgba(245, 241, 234, 0.96),
                        rgba(245, 241, 234, 0.96)),
                    url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085');

                background-size: cover;
                background-attachment: fixed;
            }

            .text-coffee {
                color: #4b2e2e;
            }

            /* BUTTON */
            .btn-coffee {
                background: linear-gradient(135deg, #6f4e37, #8b5e3c);

                color: white;
                border: none;

                padding: 12px 20px;

                border-radius: 16px;

                font-weight: 600;

                transition: 0.3s;
            }

            .btn-coffee {
                position: relative;
                z-index: 9999;
            }

            .btn-coffee:hover {
                color: white;

                transform: translateY(-2px);
            }

            /* CARD */
            .detail-card {
                border-radius: 30px;

                overflow: hidden;

                background: rgba(255, 255, 255, 0.95);

                box-shadow:
                    0 15px 40px rgba(0, 0, 0, 0.10);
            }

            /* IMAGE */
            .detail-image-wrapper {
                position: relative;

                height: 520px;

                overflow: hidden;

                background: #000;
            }

            .detail-image {
                width: 100%;
                height: 100%;

                object-fit: cover;
                object-position: center;

                display: block;

                transform: scale(1.02);

                filter:
                    brightness(1.02) contrast(1.05) saturate(1.08);

                transition: 0.7s ease;
            }

            .detail-card:hover .detail-image {
                transform: scale(1.06);
            }

            /* OVERLAY */
            .detail-overlay {
                position: absolute;
                inset: 0;

                background:
                    linear-gradient(to top,
                        rgba(0, 0, 0, 0.72) 5%,
                        rgba(0, 0, 0, 0.25) 45%,
                        rgba(0, 0, 0, 0.05) 100%);
            }

            /* CONTENT */
            .detail-image-content {
                position: absolute;

                left: 0;
                bottom: 0;

                width: 100%;

                padding: 40px;

                z-index: 3;

                color: white;
            }

            .detail-title {
                font-size: 3rem;
                font-weight: 800;

                margin-bottom: 15px;

                text-shadow:
                    0 5px 20px rgba(0, 0, 0, 0.35);
            }

            .detail-location {
                display: inline-flex;
                align-items: center;

                background: rgba(255, 255, 255, 0.14);

                backdrop-filter: blur(10px);

                padding: 10px 18px;

                border-radius: 50px;

                font-size: 15px;
            }

            /* CATEGORY */
            .category-badge {
                display: inline-flex;
                align-items: center;

                background: rgba(255, 255, 255, 0.92);

                color: #4b2e2e;

                padding: 10px 18px;

                border-radius: 50px;

                font-size: 13px;
                font-weight: 700;

                box-shadow:
                    0 8px 20px rgba(0, 0, 0, 0.15);
            }

            /* INFO BOX */
            .info-box {
                display: flex;
                align-items: center;
                gap: 16px;

                background: #fff;

                padding: 20px;

                border-radius: 24px;

                height: 100%;

                border: 1px solid #f1f1f1;

                transition: 0.3s;
            }

            .info-box:hover {
                transform: translateY(-4px);

                box-shadow:
                    0 12px 24px rgba(0, 0, 0, 0.08);
            }

            .info-icon {
                width: 55px;
                height: 55px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 18px;

                font-size: 20px;
            }

            .bg-light-brown {
                background: #f5ede7;
                color: #6f4e37;
            }

            .bg-light-green {
                background: #edf9f0;
                color: #198754;
            }

            .bg-light-yellow {
                background: #fff8e6;
                color: #ffc107;
            }

            /* BUTTONS */
            .btn-menu,
            .btn-instagram,
            .btn-maps {
                border: none;

                padding: 12px 22px;

                border-radius: 16px;

                font-weight: 600;

                color: white;

                transition: 0.3s;
            }

            .btn-menu {
                background: #198754;
            }

            .btn-instagram {
                background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
            }

            .btn-maps {
                background: #dc3545;
            }

            .btn-menu:hover,
            .btn-instagram:hover,
            .btn-maps:hover {
                color: white;

                transform: translateY(-2px);

                opacity: 0.95;
            }

            /* DESCRIPTION */
            .description-box {
                background: #faf7f3;

                padding: 28px;

                border-radius: 24px;
            }

            /* MAP */
            .map-box {
                width: 100%;
                height: 420px;

                border-radius: 24px;

                overflow: hidden;
            }

            /* REVIEW */
            .review-card {
                background: #fff;

                border: 1px solid #f1f1f1;

                border-radius: 24px;

                padding: 22px;

                transition: 0.3s;
            }

            .review-card:hover {
                transform: translateY(-4px);

                box-shadow:
                    0 12px 24px rgba(0, 0, 0, 0.08);
            }

            .review-rating {
                background: #fff8e7;

                color: #ffb400;

                padding: 8px 14px;

                border-radius: 30px;

                font-weight: 700;
            }

            /* MOBILE */
            @media(max-width:768px) {

                .detail-image-wrapper {
                    height: 320px;
                }

                .detail-title {
                    font-size: 2rem;
                }

                .detail-image-content {
                    padding: 24px;
                }

                .map-box {
                    height: 300px;
                }

            }
        </style>

        <!-- LEAFLET -->
        @if($coffee->latitude && $coffee->longitude)

            <script>

                document.addEventListener("DOMContentLoaded", function () {

                    var map = L.map('map').setView(
                        [{{ $coffee->latitude }}, {{ $coffee->longitude }}],
                        16
                    );

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; OpenStreetMap'
                    }).addTo(map);

                    L.marker([
                                                                {{ $coffee->latitude }},
                        {{ $coffee->longitude }}
                    ])
                        .addTo(map)
                        .bindPopup(`
                                                                <b>{{ $coffee->nama }}</b><br>
                                                                {{ $coffee->alamat }}
                                                            `)
                        .openPopup();

                });

            </script>

        @endif

@endsection