@extends('layout.app')

@section('title', 'kegiatan')

@section('content')

<div class="container py-4" style="max-width: 1400px;">

    {{-- Jumbotron --}}
    <div class="jumbotron text-center py-5 mb-4">
        <h1 class="display-4 fw-bold">Kegiatan</h1>
        <p class="lead">Selamat datang di halaman kegiatan Museum Nasional</p>
    </div>

    {{-- Judul --}}
    <h3 class="fw-bold mb-1">EVENT</h3>
    <p class="text-muted mb-4">Museum Maritim</p>

    {{-- Slider Event --}}
    <div class="row g-3 mb-4">
        @foreach ([
            ['img' => 'event1.jpg', 'judul' => 'KONGSI: Akulturasi Tionghoa di Akultur Indonesia', 'tanggal' => 'Februari 11, 2025'],
            ['img' => 'event2.jpg', 'judul' => 'Museum Workshop by KiN Space', 'tanggal' => 'Januari 7, 2025'],
            ['img' => 'event3.jpg', 'judul' => 'Indonesia, The Oldest Civilization On Earth...', 'tanggal' => 'Desember 18, 2024'],
        ] as $event)
        <div class="col-md-4">
            <div class="card border-0 text-white" style="height: 200px; overflow: hidden; position: relative;">
                <img src="{{ asset('images/'.$event['img']) }}" class="w-100 h-100" style="object-fit: cover;">
                <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);"></div>
                <div style="position:absolute; bottom:0; left:0; padding:15px;">
                    <span class="badge bg-warning text-dark mb-1">EVENT</span>
                    <h6 class="mb-0 fw-bold">{{ $event['judul'] }}</h6>
                    <small class="text-light">{{ $event['tanggal'] }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Konten Utama --}}
    <div class="row">
        {{-- Kolom Kiri (Daftar Event) --}}
        <div class="col-lg-8">

            {{-- Event Utama --}}
            <div class="card border-0 mb-4">
                <img src="{{ asset('images/event-main.jpg') }}" class="card-img-top" alt="Event Utama">
                <div class="card-body px-0">
                    <h5 class="fw-bold">Pekan Inklusivitas MNI</h5>
                    <small class="text-muted">Fahmi - November 25, 2024</small>
                    <p class="mt-2 mb-3 text-muted">5-7 Desember 2024 Merayakan...</p>
                    <a href="#" class="btn btn-sm btn-secondary">Baca Selengkapnya</a>
                </div>
            </div>

            {{-- Event Lainnya --}}
            <div class="card border-0 mb-4">
                <img src="{{ asset('images/event-main2.jpg') }}" class="card-img-top" alt="Event 2">
                <div class="card-body px-0">
                    <h5 class="fw-bold">Pameran Pesona Keris Nusantara</h5>
                    <small class="text-muted">Fahmi - Oktober 15, 2024</small>
                    <p class="mt-2 mb-3 text-muted">Pameran keris khas Nusantara...</p>
                    <a href="#" class="btn btn-sm btn-secondary">Baca Selengkapnya</a>
                </div>
            </div>

        </div>

        {{-- Kolom Kanan (Sidebar) --}}
        <div class="col-lg-4">

            {{-- Latest News --}}
            <h6 class="fw-bold border-bottom pb-2">LATEST NEWS</h6>
            @foreach ([
                ['img' => 'news1.jpg', 'judul' => 'LCC Museum 2021 Tingkat Nasional Kembali Digelar', 'penulis' => 'Ujung Mulyadi - Oktober 6, 2021'],
                ['img' => 'news2.jpg', 'judul' => 'Pameran Storyline Museum Nasional Baru', 'penulis' => 'November 29, 2016'],
                ['img' => 'news3.jpg', 'judul' => 'Kids Corner Museum Nasional', 'penulis' => 'September 25, 2019'],
            ] as $news)
            <div class="d-flex mb-3">
                <img src="{{ asset('images/'.$news['img']) }}" alt="News" class="flex-shrink-0" style="width: 80px; height: 60px; object-fit: cover;">
                <div class="ms-2">
                    <small class="fw-bold">{{ $news['judul'] }}</small><br>
                    <small class="text-muted">{{ $news['penulis'] }}</small>
                </div>
            </div>
            @endforeach

            {{-- Must Read --}}
            <h6 class="fw-bold border-bottom pb-2 mt-4">MUST READ</h6>
            <ul class="list-unstyled">
                <li class="mb-2"><small>18/12/2022 : Ngeronda di Museum – Nonton Bareng Final Piala Dunia 2022</small></li>
                <li class="mb-2"><small>Sulawesi Tengah Menjuarai Lomba Cerdas Cermat Museum Tingkat Nasional</small></li>
                <li class="mb-2"><small>Kids Corner Museum Nasional : Wadah Pengenalan Budaya Pada Anak Usia Dini</small></li>
            </ul>
            <button class="btn btn-outline-secondary btn-sm w-100">Muat Lebih</button>
        </div>
    </div>
</div>
@endsection
