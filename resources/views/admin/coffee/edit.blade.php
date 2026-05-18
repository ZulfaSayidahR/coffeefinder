@extends('layouts.app')

@section('content')

    <div class="container py-5">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <div>
                <h2 class="fw-bold admin-title mb-1">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit Coffee Shop
                </h2>

                <p class="text-muted mb-0">
                    Perbarui informasi coffee shop dengan tampilan modern
                </p>
            </div>

            <a href="{{ route('coffee.index') }}" class="btn btn-back shadow-sm">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali
            </a>

        </div>

        <!-- ERROR -->
        @if ($errors->any())

            <div class="alert alert-danger border-0 shadow-sm rounded-4 px-4 py-3 mb-4">

                <div class="fw-semibold mb-2">
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

        <!-- CARD -->
        <div class="card admin-card border-0">

            <div class="card-body p-4 p-lg-5">

                <form action="{{ route('coffee.update', $coffee->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row g-4">

                        <!-- NAMA -->
                        <div class="col-md-6">

                            <label class="form-label form-label-custom">
                                Nama Coffee Shop
                            </label>

                            <div class="input-group">

                                <span class="input-group-text input-icon">
                                    <i class="bi bi-cup-hot-fill"></i>
                                </span>

                                <input type="text" name="nama" class="form-control custom-input" value="{{ $coffee->nama }}"
                                    required>

                            </div>

                        </div>

                        <!-- KATEGORI -->
                        <div class="col-md-6">

                            <label class="form-label form-label-custom">
                                Kategori
                            </label>

                            <select name="kategori" class="form-select custom-input" required>

                                <option value="">Pilih Kategori</option>

                                <option value="nongkrong" {{ $coffee->kategori == 'nongkrong' ? 'selected' : '' }}>
                                    Nongkrong
                                </option>

                                <option value="keluarga" {{ $coffee->kategori == 'keluarga' ? 'selected' : '' }}>
                                    Keluarga
                                </option>

                                <option value="kerja" {{ $coffee->kategori == 'kerja' ? 'selected' : '' }}>
                                    Kerja
                                </option>

                            </select>

                        </div>

                        <!-- ALAMAT -->
                        <div class="col-12">

                            <label class="form-label form-label-custom">
                                Alamat
                            </label>

                            <textarea name="alamat" rows="3" class="form-control custom-input"
                                required>{{ $coffee->alamat }}</textarea>

                        </div>

                        <!-- SUASANA -->
                        <div class="col-md-6">

                            <label class="form-label form-label-custom">
                                Suasana
                            </label>

                            <input type="text" name="suasana" class="form-control custom-input"
                                value="{{ $coffee->suasana }}">

                        </div>

                        <!-- MENU -->
                        <div class="col-md-6">

                            <label class="form-label form-label-custom">
                                Link Menu
                            </label>

                            <input type="url" name="menu_link" class="form-control custom-input"
                                value="{{ $coffee->menu_link }}" placeholder="https://...">

                        </div>

                        <!-- HARGA -->
                        <div class="col-md-6">

                            <label class="form-label form-label-custom">
                                Harga Minimum
                            </label>

                            <input type="number" name="harga_min" class="form-control custom-input"
                                value="{{ $coffee->harga_min }}" required>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label form-label-custom">
                                Harga Maximum
                            </label>

                            <input type="number" name="harga_max" class="form-control custom-input"
                                value="{{ $coffee->harga_max }}" required>

                        </div>

                        <!-- INSTAGRAM -->
                        <div class="col-12">

                            <label class="form-label form-label-custom">
                                Instagram Coffee Shop
                            </label>

                            <div class="input-group">

                                <span class="input-group-text input-icon">
                                    <i class="bi bi-instagram"></i>
                                </span>

                                <input type="url" name="sosmed_instagram" class="form-control custom-input"
                                    placeholder="https://instagram.com/namacoffeeshop"
                                    value="{{ $coffee->sosmed_instagram }}">

                            </div>

                        </div>

                        <!-- DESKRIPSI -->
                        <div class="col-12">

                            <label class="form-label form-label-custom">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" rows="5"
                                class="form-control custom-input">{{ $coffee->deskripsi }}</textarea>

                        </div>

                        <!-- LATITUDE -->
                        <div class="col-md-6">

                            <label class="form-label form-label-custom">
                                Latitude
                            </label>

                            <input type="text" id="latitude" name="latitude" class="form-control custom-input"
                                value="{{ $coffee->latitude }}">

                        </div>

                        <!-- LONGITUDE -->
                        <div class="col-md-6">

                            <label class="form-label form-label-custom">
                                Longitude
                            </label>

                            <input type="text" id="longitude" name="longitude" class="form-control custom-input"
                                value="{{ $coffee->longitude }}">

                        </div>

                        <!-- MAP -->
                        <div class="col-12">

                            <label class="form-label form-label-custom">
                                Pilih Lokasi di Map
                            </label>

                            <div id="map" class="map-box rounded-4 shadow-sm"></div>

                        </div>

                        <!-- FOTO -->
                        <div class="col-12">

                            <label class="form-label form-label-custom">
                                Foto Coffee Shop
                            </label>

                            @if($coffee->foto)

                                <div class="mb-3">

                                    <img src="{{ asset('storage/' . $coffee->foto) }}" class="preview-image"
                                        alt="{{ $coffee->nama }}">

                                </div>

                            @endif

                            <input type="file" name="foto" class="form-control custom-input">

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end gap-3 mt-5">

                        <a href="{{ route('coffee.index') }}" class="btn btn-light px-4 py-2 rounded-4 shadow-sm">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-save px-4 py-2">

                            <i class="bi bi-save-fill me-2"></i>
                            Update Data

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
                linear-gradient(rgba(245, 241, 234, 0.95),
                    rgba(245, 241, 234, 0.95)),
                url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085');

            background-size: cover;
            background-attachment: fixed;
        }

        .admin-title {
            color: #4b2e2e;
        }

        .admin-card {
            border-radius: 30px;
            overflow: hidden;

            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.7);
        }

        .form-label-custom {
            font-weight: 600;
            color: #4b2e2e;
            margin-bottom: 10px;
        }

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

            box-shadow:
                0 0 0 0.2rem rgba(111, 78, 55, 0.15),
                0 10px 25px rgba(111, 78, 55, 0.10);
        }

        .input-icon {
            background: #6f4e37;
            color: white;
            border: none;
            border-radius: 18px 0 0 18px !important;
            padding: 0 18px;
        }

        .btn-save {
            background: linear-gradient(135deg, #6f4e37, #8b5e3c);
            color: white;
            border: none;

            border-radius: 16px;
            font-weight: 600;

            transition: 0.3s;

            box-shadow:
                0 10px 20px rgba(111, 78, 55, 0.25);
        }

        .btn-save:hover {
            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 15px 30px rgba(111, 78, 55, 0.35);
        }

        .btn-back {
            background: white;
            color: #4b2e2e;
            border-radius: 14px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .btn-back:hover {
            background: #4b2e2e;
            color: white;
        }

        .preview-image {
            width: 220px;
            height: 160px;

            object-fit: cover;

            border-radius: 20px;

            box-shadow:
                0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .map-box {
            width: 100%;
            height: 380px;
            overflow: hidden;
        }

        @media(max-width:768px) {

            .map-box {
                height: 300px;
            }

        }
    </style>

    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>

        let lat = {{ $coffee->latitude ?? -8.0657 }};
        let lng = {{ $coffee->longitude ?? 111.9025 }};

        let map = L.map('map').setView([lat, lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        let marker = L.marker([lat, lng], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function () {

            let position = marker.getLatLng();

            document.getElementById('latitude').value = position.lat;
            document.getElementById('longitude').value = position.lng;

        });

        map.on('click', function (e) {

            marker.setLatLng(e.latlng);

            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;

        });

    </script>

@endsection