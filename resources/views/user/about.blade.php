@extends('layouts.app')

@section('content')

    <!-- HERO ABOUT -->
    <section class="py-5 text-white text-center rounded-4 shadow-lg"
        style="background: linear-gradient(135deg, #4b2e2e, #8b5e3c);">

        <div class="container py-5">

            <h1 class="display-4 fw-bold">
                ☕ About Coffee Finder
            </h1>

            <p class="lead mt-3 opacity-75">
                Platform untuk menemukan coffee shop terbaik, cozy, dan aesthetic di sekitarmu
            </p>

            <a href="{{ route('user.home') }}" class="btn btn-light mt-4 px-4 py-2 rounded-pill fw-semibold shadow-sm">
                Kembali ke Home
            </a>

        </div>

    </section>


    <!-- FEATURES -->
    <section class="container py-5">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Kenapa Coffee Finder?</h2>
            <p class="text-muted">
                Kami membantu kamu menemukan tempat terbaik untuk ngopi & bekerja
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">

                    <i class="bi bi-geo-alt-fill fs-1 text-warning"></i>

                    <h5 class="fw-bold mt-3">Lokasi Terdekat</h5>
                    <p class="text-muted mb-0">
                        Temukan coffee shop di sekitarmu dengan cepat.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">

                    <i class="bi bi-star-fill fs-1 text-warning"></i>

                    <h5 class="fw-bold mt-3">Review Jujur</h5>
                    <p class="text-muted mb-0">
                        Lihat ulasan asli dari pengguna lain.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4">

                    <i class="bi bi-cup-hot-fill fs-1 text-warning"></i>

                    <h5 class="fw-bold mt-3">Rekomendasi Cozy</h5>
                    <p class="text-muted mb-0">
                        Tempat terbaik untuk nongkrong & kerja.
                    </p>

                </div>
            </div>

        </div>

    </section>

@endsection