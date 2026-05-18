@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-5">

            <div>
                <h2 class="fw-bold admin-title mb-2">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard Admin
                </h2>

                <p class="admin-subtitle mb-0">
                    Selamat datang di halaman admin Coffee Finder ☕
                </p>
            </div>

            <div class="admin-date">
                <i class="bi bi-calendar-event-fill me-2"></i>
                {{ now()->format('d M Y') }}
            </div>

        </div>

        <!-- STATISTIK -->
        <div class="row g-4 mb-5">

            <!-- COFFEE -->
            <div class="col-lg-4 col-md-6">
                <div class="dashboard-card coffee-bg">

                    <div class="dashboard-content">

                        <div class="dashboard-label">
                            Total Coffee Shop
                        </div>

                        <h2 class="dashboard-number">
                            {{ $totalCoffee }}
                        </h2>

                        <div class="dashboard-desc">
                            Data seluruh coffee shop
                        </div>

                    </div>

                    <div class="dashboard-icon-wrapper">
                        <i class="bi bi-cup-hot-fill dashboard-icon"></i>
                    </div>

                </div>
            </div>

            <!-- REVIEW -->
            <div class="col-lg-4 col-md-6">
                <div class="dashboard-card review-bg">

                    <div class="dashboard-content">

                        <div class="dashboard-label">
                            Total Review
                        </div>

                        <h2 class="dashboard-number">
                            {{ $totalReview }}
                        </h2>

                        <div class="dashboard-desc">
                            Review dari pengguna
                        </div>

                    </div>

                    <div class="dashboard-icon-wrapper">
                        <i class="bi bi-chat-square-text-fill dashboard-icon"></i>
                    </div>

                </div>
            </div>

            <!-- USER -->
            <div class="col-lg-4 col-md-12">
                <div class="dashboard-card user-bg">

                    <div class="dashboard-content">

                        <div class="dashboard-label">
                            Total User
                        </div>

                        <h2 class="dashboard-number">
                            {{ $totalUser }}
                        </h2>

                        <div class="dashboard-desc">
                            Akun pengguna terdaftar
                        </div>

                    </div>

                    <div class="dashboard-icon-wrapper">
                        <i class="bi bi-people-fill dashboard-icon"></i>
                    </div>

                </div>
            </div>

        </div>

        <!-- QUICK MENU -->
        <div class="row g-4">

            <!-- COFFEE -->
            <div class="col-lg-4 col-md-6">

                <a href="{{ route('coffee.index') }}" class="quick-card text-decoration-none">

                    <div class="quick-top">

                        <div class="quick-icon-box">
                            <i class="bi bi-cup-hot-fill quick-icon"></i>
                        </div>

                        <span class="quick-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </span>

                    </div>

                    <h5 class="quick-title">
                        Kelola Coffee Shop
                    </h5>

                    <p class="quick-text">
                        Tambah, edit, dan hapus data coffee shop dengan mudah.
                    </p>

                </a>

            </div>

            <!-- REVIEW -->
            <div class="col-lg-4 col-md-6">

                <a href="{{ route('admin.review.index') }}" class="quick-card text-decoration-none">

                    <div class="quick-top">

                        <div class="quick-icon-box review-icon-bg">
                            <i class="bi bi-chat-left-text-fill quick-icon"></i>
                        </div>

                        <span class="quick-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </span>

                    </div>

                    <h5 class="quick-title">
                        Kelola Review
                    </h5>

                    <p class="quick-text">
                        Lihat dan kelola seluruh review pengguna.
                    </p>

                </a>

            </div>

            <!-- USER -->
            <div class="col-lg-4 col-md-6">

                <a href="{{ route('admin.user.index') }}" class="quick-card text-decoration-none">

                    <div class="quick-top">

                        <div class="quick-icon-box user-icon-bg">
                            <i class="bi bi-person-fill-gear quick-icon"></i>
                        </div>

                        <span class="quick-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </span>

                    </div>

                    <h5 class="quick-title">
                        Kelola User
                    </h5>

                    <p class="quick-text">
                        Manajemen akun pengguna dan admin website.
                    </p>

                </a>

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

        /* TITLE */
        .admin-title {
            color: #4b2e2e;
            font-size: 34px;
        }

        .admin-subtitle {
            color: #7b6d62;
            font-size: 15px;
        }

        /* DATE */
        .admin-date {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);

            padding: 14px 22px;

            border-radius: 18px;

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.08);

            font-weight: 600;
            color: #4b2e2e;
        }

        /* DASHBOARD CARD */
        .dashboard-card {
            position: relative;

            overflow: hidden;

            border-radius: 30px;

            padding: 35px;

            color: white;

            display: flex;
            justify-content: space-between;
            align-items: center;

            min-height: 220px;

            box-shadow:
                0 18px 40px rgba(0, 0, 0, 0.12);

            transition: 0.4s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-8px) scale(1.01);
        }

        .dashboard-card::before {
            content: '';

            position: absolute;
            top: -50px;
            right: -50px;

            width: 180px;
            height: 180px;

            background: rgba(255, 255, 255, 0.10);

            border-radius: 50%;
        }

        .dashboard-content {
            position: relative;
            z-index: 2;
        }

        .dashboard-label {
            font-size: 16px;
            font-weight: 600;
            opacity: 0.9;
            margin-bottom: 10px;
        }

        .dashboard-number {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .dashboard-desc {
            font-size: 14px;
            opacity: 0.9;
        }

        .dashboard-icon-wrapper {
            position: relative;
            z-index: 2;
        }

        .dashboard-icon {
            font-size: 65px;
            opacity: 0.85;
        }

        /* COLORS */
        .coffee-bg {
            background: linear-gradient(135deg, #6f4e37, #8b5e3c);
        }

        .review-bg {
            background: linear-gradient(135deg, #ff9800, #ffb74d);
        }

        .user-bg {
            background: linear-gradient(135deg, #1976d2, #42a5f5);
        }

        /* QUICK CARD */
        .quick-card {
            background: rgba(255, 255, 255, 0.95);

            backdrop-filter: blur(10px);

            border-radius: 30px;

            padding: 35px;

            display: block;

            height: 100%;

            transition: 0.35s ease;

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.08);

            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .quick-card:hover {
            transform: translateY(-8px);

            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .quick-top {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 25px;
        }

        .quick-icon-box {
            width: 75px;
            height: 75px;

            border-radius: 22px;

            background: #f5ede7;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .review-icon-bg {
            background: #fff3e0;
        }

        .user-icon-bg {
            background: #e3f2fd;
        }

        .quick-icon {
            font-size: 34px;
            color: #6f4e37;
        }

        .quick-arrow {
            width: 45px;
            height: 45px;

            border-radius: 14px;

            background: #f8f8f8;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #4b2e2e;

            transition: 0.3s;
        }

        .quick-card:hover .quick-arrow {
            background: #6f4e37;
            color: white;
        }

        .quick-title {
            font-weight: 700;
            color: #4b2e2e;

            margin-bottom: 12px;
        }

        .quick-text {
            color: #7b6d62;
            line-height: 1.7;
            margin-bottom: 0;
        }

        /* MOBILE */
        @media(max-width:768px) {

            .dashboard-card {
                min-height: 180px;
                padding: 28px;
            }

            .dashboard-number {
                font-size: 42px;
            }

            .dashboard-icon {
                font-size: 50px;
            }

            .quick-card {
                padding: 28px;
            }

            .admin-title {
                font-size: 28px;
            }

        }
    </style>

@endsection