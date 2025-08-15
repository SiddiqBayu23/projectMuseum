@extends('layout.app')

@section('title', 'beranda')

@section('content')

    @if ($banners->count() > 0)
        <div id="jumbotronCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">

                {{-- Slide 1 --}}
                @foreach ($banners as $index => $banner)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="4000">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $banner->image) }}" class="d-block w-100"
                                style="height: 100vh; object-fit: cover;" alt="Museum">
                            <!-- Overlay -->
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
                        </div>
                        <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                            <h1 class="fw-bold display-4">{{ $banner->title }}</h1>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Tombol Navigasi --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#jumbotronCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#jumbotronCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    @endif

    {{-- ISI HALAMAN --}}
    <div class="py-5 mt-0 pt-1 w-100">

        <div class="w-100 px-4">
            <div class="row text-center mt-4">
                @foreach ($categories as $category)
                    <div class="col-6 col-md-3 mb-3">
                        <a href="{{ url($category->url) }}" class="text-decoration-none text-secondary">
                            <div class="kotak-ikon border-secondary">
                                <div
                                    class="ratio ratio-1x1 d-flex justify-content-center align-items-center rounded-3 mb-3 overflow-hidden p-5">
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                        class="w-100 h-100 object-fit-cover" alt="{{ $category->title }}">
                                </div>
                                <div class="judul-ikon">{{ $category->title }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="prosedur mt-4 pt-4 d-flex flex-wrap gap-3 p-4 rounded-3">
                <div class="row">
                    <div class="col-12 col-md-3 d-flex flex-column justify-content-center text-end mb-4 mb-md-0 p-4">
                        <h3>Layanan</h3>
                        <p>
                            {{ $service->day }}<br>
                            {{ $service->time }}
                        </p>
                    </div>
                    <div class="col-12 col-md-5 d-flex flex-column justify-content-center text-start mb-4 mb-md-0 p-4">
                        <h4>Prosedur Kunjungan</h4>
                        {!! $service->procedure !!}
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="{{ $service->url }}" target="_blank">
                            <img src="{{ $service->thumbnail ? asset('storage/' . $service->thumbnail) : asset('images/virtualmuseum.jpg') }}"
                                alt="Virtual Museum" class="img-fluid">
                        </a>
                        <div class="teks-gambar mt-2">
                            <a href="{{ $service->url }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Instagram & YouTube --}}
    <div class="instagram-youtube-wrapper mt-4 p-3">
        <div class="d-flex align-items-center justify-content-center flex-wrap text-center text-black">
            <div class="col-md-4">
                <img src="images/dongeng.jpg" alt="Poster" class="poster-img">
            </div>
            <div class="col-md-7 text-start">
                <h4 class="fw-bold mb-3">YOUTUBE & IG LIVE</h4>
                <div class="instagram-grid text-center">
                    @foreach ($video_streamings as $video_streaming)
                        <a href="{{ $video_streaming->video_url }}" target="_blank"><img
                                src="{{ asset('storage/' . $video_streaming->thumbnail) }}" class="img-youtube"></a>
                    @endforeach

                </div>
                <div class="text-center">
                    <a href="https://www.youtube.com/" class="btn btn-primary mt-3">LIHAT VIDEO</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik dan Gambar Berdampingan --}}
    <div class="container my-5">
        <div class="row align-items-center">

            {{-- Grafik Data Pengunjung --}}
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <canvas id="pengunjungChart" style="max-width: 100%; height: 300px;"></canvas>
            </div>

            {{-- Gambar di samping grafik --}}
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="img-wrapper shadow rounded p-2 bg-light" style="max-width: 400px; width: 100%;">
                    <img src="images/ruang-kegiatan.jpg" alt="Gambar Contoh" class="img-fluid custom-img"
                        style="object-fit: cover;">
                </div>
            </div>

        </div>
    </div>

    {{-- Berita --}}
    @if ($news->count() > 0)
        <div class="berita mt-4 px-3 container" style="margin-bottom: 1cm;">
            <h4 class="fw-bold mb-3">Berita</h4>
            <hr>
            <div class="row g-3">
                @foreach ($news as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="bg-light rounded shadow-sm h-100 overflow-hidden">
                            <a href="{{ route('news.show', $item->slug) }}" class="text-decoration-none d-block h-100">
                                <div style="height: 180px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-100 h-100" style="object-fit: cover;">
                                </div>
                                <div class="p-3">
                                    <h5 class="text-dark fw-semibold mb-1 text-truncate">{{ $item->title }}</h5>
                                    <p class="text-muted mb-2" style="font-size: 12px">
                                        {{ $item->created_at->translatedFormat('j F Y') }}
                                    </p>
                                    <p class="text-muted small mb-0">{{ Str::limit($item->summary, 100, '...') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endif

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pengunjungChart').getContext('2d');
        const pengunjungChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: @json($data), // Data dummy, bisa diganti dari database
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 2
                        }
                    }
                }
            }
        });
    </script>
@endsection
