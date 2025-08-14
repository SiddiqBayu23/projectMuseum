@extends('layout.app')

@section('title', 'koleksi')

@section('content')

    @php
        $klasifikasi = [
            ['judul' => 'Alat Makan KPM', 'img' => 'placeholder.jpg', 'link' => '/kpm'],
            ['judul' => 'Plakat', 'img' => 'placeholder.jpg', 'link' => '/plakat'],
            ['judul' => 'Surat Berharga', 'img' => 'placeholder.jpg', 'link' => '/surat'],
            ['judul' => 'Mebel', 'img' => 'placeholder.jpg', 'link' => '/mebel'],
            ['judul' => 'Bintang', 'img' => 'placeholder.jpg', 'link' => '/bintang'],
            ['judul' => 'Pakaian', 'img' => 'placeholder.jpg', 'link' => '/pakaian'],
            ['judul' => 'Dokumen', 'img' => 'placeholder.jpg', 'link' => '/dokumen'],
            ['judul' => 'Lukisan', 'img' => 'placeholder.jpg', 'link' => '/lukisan'],
            ['judul' => 'Medali', 'img' => 'placeholder.jpg', 'link' => '/medali'],
            ['judul' => 'Peralatan Navigasi', 'img' => 'placeholder.jpg', 'link' => '/peralatan-navigasi'],
        ];
    @endphp

    <div class="container-fluid py-4">
        <!-- Dropdown & Search -->
        <div class="row mb-3">
            <div class="col-md-6 d-flex">
                <!-- Dropdown -->
                <div class="dropdown me-3 w-50">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                        Klasifikasi Koleksi
                    </button>
                    <ul class="dropdown-menu w-100">
                        @foreach ($klasifikasi as $item)
                            <li>
                                <a class="dropdown-item" href="{{ url($item['link']) }}">
                                    {{ $item['judul'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Search -->
            <div class="col-md-6 d-flex justify-content-end">
                <form class="d-flex w-50" role="search">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
        </div>

        <!-- Paragraf -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class="text-muted" style="text-align: justify;">
                    Museum Maritim Indonesia saat ini memiliki total 1400-an koleksi, baik asli maupun replika.
                    Beberapa koleksi museum didapatkan dengan cara hibah, baik dari Kementerian terkait maupun
                    pribadi yang bertemakan Kemaritiman dan Kepelabuhanan.
                </p>
            </div>
        </div>

        <!-- Klasifikasi Grid -->
        @php
            $klasifikasiGrid = [
                ['judul' => 'Alat Makan KPM', 'img' => 'images/telephone.jpg'],
                ['judul' => 'Plakat', 'img' => 'images/plakat.jpg'],
                ['judul' => 'Surat Berharga', 'img' => 'images/museum.jpg'],
                ['judul' => 'Mebel', 'img' => 'images/museum.jpg'],
                ['judul' => 'Bintang', 'img' => 'images/museum.jpg'],
                ['judul' => 'Pakaian', 'img' => 'images/museum.jpg'],
            ];
        @endphp

        <div class="container py-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($klasifikasiGrid as $item)
                    <div class="col d-flex">
                        <div class="card w-100 shadow-sm">
                            <img src="{{ asset($item['img']) }}" class="card-img-top" alt="{{ $item['judul'] }}"
                                style="height: 220px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h6 class="card-title mb-0">{{ $item['judul'] }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @endsection
