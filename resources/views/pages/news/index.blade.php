@extends('layout.app')

@section('title', 'Berita')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/berita.css') }}">
@endpush

@section('content')

<!-- Hero Banner -->
<div class="hero-banner">
    <div class="hero-content">
        <h1 class="fw-bold text-white">Berita Terbaru</h1>
        <p class="text-white-50">Dapatkan informasi terkini dari Museum Nasional</p>
    </div>
</div>

<!-- Search Bar -->
<div class="container my-3 max-content-width">
    <div class="row">
        <div class="col search-bar-wrapper text-end">
            <form class="d-flex justify-content-end search-form" role="search">
                <div class="input-group">
                    <input class="form-control search-input" type="search" placeholder="Cari berita..." aria-label="Search">
                    <button class="btn-search" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Daftar Berita -->
<div class="berita mt-4 px-3 max-content-width" style="margin-bottom: 1cm;">
    <h4 class="fw-bold mb-3">Berita</h4>
    <hr>
    <div class="row g-4">
        @for ($i = 0; $i < 8; $i++)
        <div class="col-md-3 col-sm-6">
            <a href="#" class="text-decoration-none h-100">
                <div class="news-card">
                    <img src="{{ asset('images/koleksi.jpg') }}" class="w-100" alt="Berita">
                    <div class="p-3 flex-grow-1">
                        <h5>Judul Berita Menarik</h5>
                        <p>Ringkasan berita singkat yang membuat pembaca penasaran...</p>
                    </div>
                </div>
            </a>
        </div>
        @endfor
    </div>
</div>

<!-- Pagination -->
<div class="row mt-4 max-content-width">
    <div class="col d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Selanjutnya</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection
