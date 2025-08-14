@extends('layout.app')

@section('title', 'Koleksi')

@section('content')

@php
    $klasifikasi = [
        'Alat Makan KPM', 'Plakat', 'Surat Berharga', 'Mebel', 'Bintang', 'Pakaian',
        'Peralatan Pelayaran', 'Alat Navigasi', 'BMKT', 'Buku', 'Kartu', 'Maket',
        'Peralatan Dermaga', 'Alat Komunikasi', 'Diorama', 'Infografis', 'Miniatur Kapal', 'Tayangan Video'
    ];

    $koleksi = [
        ['judul' => 'Alat Makan KPM', 'img' => 'placeholder.jpg'],
        ['judul' => 'Plakat', 'img' => 'placeholder.jpg'],
        ['judul' => 'Surat Berharga', 'img' => 'placeholder.jpg'],
        ['judul' => 'Mebel', 'img' => 'placeholder.jpg'],
        ['judul' => 'Bintang', 'img' => 'placeholder.jpg'],
        ['judul' => 'Pakaian', 'img' => 'placeholder.jpg'],
    ];
@endphp

<div class="container py-4">
    <div class="row">
        <!-- Kolom kiri -->
        <div class="col-md-3">
            <select class="form-select mb-2">
                <option selected>Klasifikasi Koleksi</option>
                @foreach($klasifikasi as $item)
                    <option>{{ $item }}</option>
                @endforeach
            </select>
        </div>

        <!-- Kolom kanan -->
        <div class="col-md-9">
            <!-- Search -->
            <div class="d-flex justify-content-end mb-3">
                <input type="text" class="form-control w-25" placeholder="search">
            </div>

            <!-- Paragraf -->
            <p class="text-center text-muted">
                Museum Maritim Indonesia saat ini memiliki total 1400-an koleksi, baik asli maupun replika.
                Beberapa koleksi museum didapatkan dengan cara hibah, baik dari Kementerian terkait maupun
                pribadi yang bertemakan Kemaritiman dan Kepelabuhanan
            </p>

            <!-- Grid Koleksi -->
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                @foreach($koleksi as $item)
                <div class="col">
                    <div class="card text-center border-0 shadow-sm h-100">
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height:180px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-image text-secondary" viewBox="0 0 16 16">
                                <path d="M14.002 3a1 1 0 0 1 1 1v8.002a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1V4.002a1 1 0 0 1 1-1h12zM0 4.002A2 2 0 0 1 2.002 2h12A2 2 0 0 1 16 4.002v8.002a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V4.002z"/>
                                <path d="M10.648 8.646a.5.5 0 0 0-.708 0l-2.5 2.5-1.5-1.5a.5.5 0 0 0-.708.708l1.854 1.853a.5.5 0 0 0 .708 0l2.646-2.647a.5.5 0 0 0 0-.708z"/>
                                <path d="M6.002 5.002a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        </div>
                        <div class="card-footer bg-dark text-white fw-bold">
                            {{ $item['judul'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection
