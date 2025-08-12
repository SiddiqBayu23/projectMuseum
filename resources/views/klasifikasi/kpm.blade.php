@extends('layout.app')

@section('title', 'kpm')

@section('content')

@php
    $klasifikasi = [
        ['judul' => 'Alat Makan KPM', 'img' => 'placeholder.jpg', 'link' => '/kpm'],
        ['judul' => 'Plakat', 'img' => 'placeholder.jpg', 'link' => '/plakat'],
        ['judul' => 'Surat Berharga', 'img' => 'placeholder.jpg', 'link' => '/surat-berharga'],
        ['judul' => 'Mebel', 'img' => 'placeholder.jpg', 'link' => '/mebel'],
        ['judul' => 'Bintang', 'img' => 'placeholder.jpg', 'link' => '/bintang'],
        ['judul' => 'Pakaian', 'img' => 'placeholder.jpg', 'link' => '/pakaian'],
        ['judul' => 'Dokumen', 'img' => 'placeholder.jpg', 'link' => '/dokumen'],
        ['judul' => 'Lukisan', 'img' => 'placeholder.jpg', 'link' => '/lukisan'],
        ['judul' => 'Medali', 'img' => 'placeholder.jpg', 'link' => '/medali'],
        ['judul' => 'Peralatan Navigasi', 'img' => 'placeholder.jpg', 'link' => '/peralatan-navigasi'],
    ];

    $currentPath = request()->path();
@endphp

<style>
    .dropdown-item.active {
        background-color: transparent !important;
        color: inherit !important;
        font-weight: normal !important;
    }

    /* Lebar tabel ukuran */
    .table-ukuran {
        min-width: calc(100px + 10cm); /* tambah sekitar 5cm dari ukuran default */
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar Kiri -->
        <div class="col-md-4">
            <!-- Dropdown -->
            <div class="dropdown mb-3" style="width: 10cm;">
                <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">
                    Klasifikasi
                </button>
                <ul class="dropdown-menu w-100">
                    @foreach ($klasifikasi as $item)
                        @php
                            $isActive = trim($item['link'], '/') === $currentPath;
                        @endphp
                        <li>
                            <a class="dropdown-item {{ $isActive ? 'active' : '' }}"
                               href="{{ $isActive ? '#' : url($item['link']) }}">
                                {{ $item['judul'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Chart -->
            <div class="card" style="width: 10cm;">
                <div class="card-body">
                    <h5 class="card-title">Hibah dari</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Konten Kanan -->
        <div class="col-md-8">
            <div class="row">
                <!-- Gambar Utama -->
                <div class="col-md-8">
                    <img src="images/telephone.jpg" class="img-fluid mb-3" alt="Telepon Transciever VHF/FM">
                </div>
                <!-- Gambar Kecil -->
                <div class="col-md-4">
                    <img src="images/telephone.jpg" class="img-fluid mb-2" alt="">
                    <img src="images/telephone.jpg" class="img-fluid mb-2" alt="">
                </div>
            </div>

            <!-- Info Koleksi -->
            <div class="d-flex align-items-start mt-3">
                <!-- Detail Info -->
                <div class="me-4">
                    <h5>Telepon Transciever VHF/FM</h5>
                    <p>
                        <strong>No. Inv:</strong> 074/14/MUMI/2025<br>
                        <strong>Klasifikasi Koleksi:</strong> Alat Komunikasi
                    </p>
                    <p>
                        <strong>Bahan:</strong> <span class="fw-bold">Logam, Elektronik</span><br>
                        <strong>Warna:</strong> <span class="text-success fw-bold">Hijau Toska</span><br>
                        <strong>Cara Perolehan:</strong> <span class="fw-bold">Sumbangan IT Regional 2 Tanjung Priok</span>
                    </p>
                    <!-- Deskripsi -->
                    <p>
                        <strong>Deskripsi:</strong><br>
                        Telepon ini berbentuk kotak dengan gagang telepon dan kabel yang menghubungkan gagang ke kotak elektronik telepon. 
                        Terdapat beberapa tombol-tombol pengaturan pada bagian atas telepon. Kotak telepon berwarna hijau toska dan gagang telepon berwarna hitam.
                    </p>
                    <!-- Fungsi -->
                    <p>
                        <strong>Fungsi:</strong><br>
                        Berkomunikasi dari dermaga dengan kapal dan antar kantor di dermaga.
                    </p>
                </div>

                <!-- Ukuran -->
                <div>
                    <p><strong>Ukuran:</strong></p>
                    <table class="table table-bordered table-ukuran mb-0">
                        <thead>
                            <tr>
                                <th>Panjang</th>
                                <th>Lebar</th>
                                <th>Tinggi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>30 cm</td>
                                <td>25 cm</td>
                                <td>21.5 cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
