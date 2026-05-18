<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Coffee Finder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f5f1ea;
            overflow-x: hidden;
        }

        /* =================================
           NAVBAR
        ================================= */
        .navbar-custom {
            background: linear-gradient(135deg, #4b2e2e, #8b5e3c);
            padding: 14px 0;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: white !important;

            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand i {
            color: #ffd28d;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 10px 14px !important;
            border-radius: 10px;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.12);
        }

        .user-info {
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 14px;
            border-radius: 30px;
            color: white;
            font-size: 14px;
            backdrop-filter: blur(5px);
        }

        /* =================================
           BUTTON
        ================================= */
        .btn-coffee {
            background: linear-gradient(135deg, #6f4e37, #8b5e3c);
            border: none;
            color: white;
            border-radius: 12px;
            padding: 10px 16px;
            transition: 0.3s;
        }

        .btn-coffee:hover {
            background: #4b2e2e;
            color: white;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            border-radius: 10px;
            padding: 8px 12px;
            text-decoration: none;
        }

        .btn-delete:hover {
            background: #b02a37;
            color: white;
        }

        .btn-edit {
            background: #0d6efd;
            color: white;
            border-radius: 10px;
            padding: 8px 12px;
            text-decoration: none;
        }

        .btn-edit:hover {
            background: #0b5ed7;
            color: white;
        }

        /* =================================
           HERO
        ================================= */
        .hero {
            height: 360px;
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            text-align: center;
            color: white;

            overflow: hidden;
        }

        .hero-user {
            background:
                url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb') center/cover no-repeat;
        }

        .hero-admin {
            background:
                url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085') center/cover no-repeat;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;

            background: linear-gradient(rgba(0, 0, 0, 0.65),
                    rgba(0, 0, 0, 0.55));
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 20px;
            max-width: 900px;
        }

        .hero-title {
            font-size: 52px;
            font-weight: 700;

            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;

            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
        }

        .hero-title i {
            color: #ffd28d;
        }

        .hero-subtitle {
            margin-top: 18px;
            font-size: 18px;

            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;

            opacity: 0.95;
        }

        .hero-subtitle i {
            color: #ffd28d;
        }

        .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.7);
        }

        .admin-badge {
            display: inline-block;

            background: rgba(255, 255, 255, 0.15);

            padding: 10px 18px;
            border-radius: 30px;

            font-size: 14px;
            font-weight: 600;

            backdrop-filter: blur(6px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* =================================
           CONTENT
        ================================= */
        .main-container {
            padding-top: 40px;
            padding-bottom: 50px;
        }

        /* =================================
           CARD
        ================================= */
        .coffee-card,
        .form-card,
        .table-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            border: none;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
        }

        .coffee-card {
            transition: 0.3s;
        }

        .coffee-card:hover {
            transform: translateY(-6px);
        }

        .coffee-card img {
            height: 220px;
            object-fit: cover;
        }

        /* =================================
           TABLE
        ================================= */
        .table-modern thead {
            background: linear-gradient(135deg, #6f4e37, #8b5e3c);
            color: white;
        }

        .table-modern th {
            border: none;
            padding: 15px;
            font-weight: 600;
        }

        .table-modern td {
            padding: 15px;
            vertical-align: middle;
        }

        .table-modern tbody tr {
            transition: 0.3s;
        }

        .table-modern tbody tr:hover {
            background: #f8f5f2;
        }

        .table-img {
            width: 90px;
            height: 70px;
            object-fit: cover;
            border-radius: 12px;
        }

        /* =================================
           FORM
        ================================= */
        .form-card {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #4b2e2e;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8b5e3c;
            box-shadow: 0 0 10px rgba(139, 94, 60, 0.2);
        }

        /* =================================
           INSTAGRAM BUTTON
        ================================= */
        .btn-instagram {
            background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
            color: white;
            padding: 6px 12px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 13px;
            transition: 0.3s;
        }

        .btn-instagram:hover {
            color: white;
            transform: translateY(-2px);
        }

        /* =================================
           RESPONSIVE
        ================================= */
        @media(max-width:768px) {

            .hero {
                height: 300px;
                padding: 20px;
            }

            .hero-title {
                font-size: 34px;
            }

            .hero-subtitle {
                font-size: 14px;
            }

            .user-info {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">

        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-cup-hot-fill fs-3"></i>
                Coffee Finder
            </a>

            <!-- TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">

                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navbarContent">

                @auth

                    @if(auth()->user()->role == 'admin')

                        <ul class="navbar-nav me-auto ms-4">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer2 me-1"></i>
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('coffee.index') }}">
                                    <i class="bi bi-cup-hot-fill me-1"></i>
                                    Coffee Shop
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.review.index') }}">
                                    <i class="bi bi-chat-square-text-fill me-1"></i>
                                    Review
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.user.index') }}">
                                    <i class="bi bi-people-fill me-1"></i>
                                    User
                                </a>
                            </li>

                        </ul>

                    @endif

                    <div class="d-flex align-items-center gap-3 ms-auto">

                        <div class="user-info">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ auth()->user()->name }}
                        </div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="btn btn-light">
                                <i class="bi bi-box-arrow-right me-1"></i>
                                Logout
                            </button>
                        </form>

                    </div>

                @else

                    <div class="ms-auto">
                        <a href="{{ route('login') }}" class="btn btn-light">
                            Login
                        </a>
                    </div>

                @endauth

            </div>

        </div>

    </nav>

    <!-- HERO -->
    @if(auth()->check() && auth()->user()->role == 'admin')

        <!-- HERO ADMIN -->
        <section class="hero hero-admin">

            <div class="hero-overlay"></div>

            <div class="hero-content">


                <h1 class="hero-title">
                    <i class="bi bi-shield-check"></i>
                    Selamat Datang, Admin
                </h1>

                <p class="hero-subtitle">

                    <i class="bi bi-cup-hot-fill"></i>
                    Kelola Coffee Shop

                    <span class="dot"></span>

                    <i class="bi bi-chat-left-text-fill"></i>
                    Review User

                    <span class="dot"></span>

                    <i class="bi bi-people-fill"></i>
                    Manajemen Pengguna

                </p>

            </div>

        </section>

    @else

        <!-- HERO USER -->
        <section class="hero hero-user">

            <div class="hero-overlay"></div>

            <div class="hero-content">

                <h1 class="hero-title">

                    <i class="bi bi-cup-hot-fill"></i>

                    Temukan Coffee Shop Terbaik

                </h1>

                <p class="hero-subtitle">

                    <i class="bi bi-stars"></i>
                    Cozy

                    <span class="dot"></span>

                    <i class="bi bi-camera-fill"></i>
                    Aesthetic

                    <span class="dot"></span>

                    <i class="bi bi-people-fill"></i>
                    Nongkrong

                    <span class="dot"></span>

                    <i class="bi bi-laptop-fill"></i>
                    Kerja

                </p>

            </div>

        </section>

    @endif

    <!-- CONTENT -->
    <main class="container main-container">
        @yield('content')
    </main>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- LEAFLET -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</body>

</html>