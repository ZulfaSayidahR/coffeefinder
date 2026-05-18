@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>

                <h2 class="fw-bold text-coffee mb-1">
                    <i class="bi bi-plus-circle-fill me-2"></i>
                    Tambah Coffee Shop
                </h2>

                <p class="text-muted mb-0">
                    Tambahkan coffee shop baru dengan tampilan modern
                </p>

            </div>

            <a href="{{ route('coffee.index') }}" class="btn btn-secondary rounded-4 px-4 shadow-sm">

                <i class="bi bi-arrow-left me-2"></i>
                Kembali

            </a>

        </div>

        <!-- ERROR -->
        @if ($errors->any())

            <div class="alert alert-danger border-0 shadow-sm rounded-4">

                <div class="fw-bold mb-2">

                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Terjadi Kesalahan

                </div>

                <ul class="mb-0 ps-3">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- FORM CARD -->
        <div class="card border-0 form-card">

            <div class="card-body p-4 p-lg-5">

                <form action="{{ route('coffee.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row g-4">

                        <!-- NAMA -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Nama Coffee Shop
                            </label>

                            <input type="text" name="nama" class="form-control custom-input"
                                placeholder="Masukkan nama coffee shop" required>

                        </div>

                        <!-- ALAMAT -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Alamat
                            </label>

                            <input type="text" name="alamat" class="form-control custom-input" placeholder="Masukkan alamat"
                                required>

                        </div>

                        <!-- HARGA MIN -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Harga Minimum
                            </label>

                            <input type="number" name="harga_min" class="form-control custom-input"
                                placeholder="Contoh: 10000" required>

                        </div>

                        <!-- HARGA MAX -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Harga Maximum
                            </label>

                            <input type="number" name="harga_max" class="form-control custom-input"
                                placeholder="Contoh: 50000" required>

                        </div>

                        <!-- KATEGORI -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Kategori
                            </label>

                            <select name="kategori" class="form-select custom-input" required>

                                <option value="">
                                    Pilih Kategori
                                </option>

                                <option value="nongkrong">
                                    Nongkrong
                                </option>

                                <option value="work">
                                    Work / Remote Work
                                </option>

                                <option value="keluarga">
                                    Keluarga
                                </option>

                                <option value="instagramable">
                                    Instagramable
                                </option>

                                <option value="belajar">
                                    Belajar / Reading
                                </option>

                                <option value="outdoor">
                                    Outdoor / Garden
                                </option>

                                <option value="chill">
                                    Chill / Santai
                                </option>

                            </select>

                        </div>

                        <!-- SUASANA -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Suasana
                            </label>

                            <input type="text" name="suasana" class="form-control custom-input"
                                placeholder="Contoh: Cozy, Outdoor">

                        </div>

                        <!-- INSTAGRAM -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Link Instagram
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-instagram"></i>
                                </span>

                                <input type="url" name="sosmed_instagram" class="form-control"
                                    placeholder="https://instagram.com/namacoffeeshop"
                                    value="{{ old('sosmed_instagram') }}">
                            </div>
                        </div>

                        <!-- MENU -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Link Menu
                            </label>

                            <input type="text" name="menu_link" class="form-control custom-input"
                                placeholder="https://menu.com">

                        </div>

                        <!-- LATITUDE -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Latitude
                            </label>

                            <input type="text" name="latitude" class="form-control custom-input" placeholder="-8.123456">

                        </div>

                        <!-- LONGITUDE -->
                        <div class="col-md-6">

                            <label class="form-label fw-semibold text-coffee">
                                Longitude
                            </label>

                            <input type="text" name="longitude" class="form-control custom-input" placeholder="111.987654">

                        </div>

                        <!-- DESKRIPSI -->
                        <div class="col-12">

                            <label class="form-label fw-semibold text-coffee">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" rows="4" class="form-control custom-input"
                                placeholder="Masukkan deskripsi coffee shop"></textarea>

                        </div>

                        <!-- FOTO -->
                        <div class="col-12">

                            <label class="form-label fw-semibold text-coffee">
                                Foto Coffee Shop
                            </label>

                            <input type="file" name="foto" class="form-control custom-file">

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end gap-3 mt-5">

                        <a href="{{ route('coffee.index') }}" class="btn btn-light px-4 py-2 rounded-4 shadow-sm">

                            Batal

                        </a>

                        <button type="submit" class="btn btn-coffee px-4 py-2 rounded-4 shadow">

                            <i class="bi bi-save-fill me-2"></i>
                            Simpan Data

                        </button>

                    </div>

                </form>

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

        /* CARD */
        .form-card {
            border-radius: 28px;

            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.7);
        }

        /* INPUT */
        .custom-input {
            border: none;
            border-radius: 18px !important;

            padding: 14px 18px;

            background: #f8f5f2;

            box-shadow:
                inset 3px 3px 8px rgba(0, 0, 0, 0.04),
                inset -3px -3px 8px rgba(255, 255, 255, 0.8);

            transition: 0.3s;
        }

        .custom-input:focus {
            background: white;

            border: none;

            box-shadow:
                0 0 0 0.2rem rgba(111, 78, 55, 0.12),
                0 10px 25px rgba(111, 78, 55, 0.10);
        }

        /* FILE */
        .custom-file {
            border-radius: 18px;
            padding: 12px 16px;

            background: #f8f5f2;
            border: none;
        }

        /* BUTTON */
        .btn-coffee {
            background: linear-gradient(135deg, #6f4e37, #8b5e3c);
            color: white;
            border: none;

            font-weight: 600;

            transition: 0.3s;
        }

        .btn-coffee:hover {
            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 12px 24px rgba(111, 78, 55, 0.25);
        }

        @media(max-width:768px) {

            .form-card {
                border-radius: 22px;
            }

        }
    </style>

@endsection