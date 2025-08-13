@extends('layout.app')

@section('title', 'beranda')

@section('content')

    <div id="jumbotronCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">

        {{-- Slide 1 --}}
        <div class="carousel-item active" data-bs-interval="4000">
            <div class="position-relative">
                <img src="{{ asset('images/museum.jpg') }}" class="d-block w-100"
                    style="height: 100vh; object-fit: cover;" alt="Museum">
                <!-- Overlay -->
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h1 class="fw-bold display-4">SELAMAT DATANG DI MUSEUM MARITIM INDONESIA</h1>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="carousel-item" data-bs-interval="4000">
            <div class="position-relative">
                <img src="{{ asset('images/foto1.jpg') }}" class="d-block w-100"
                    style="height: 100vh; object-fit: cover;" alt="Koleksi">
                <!-- Overlay -->
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h1 class="fw-bold display-4">TEMUKAN KOLEKSI BERSEJARAH</h1>
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="carousel-item" data-bs-interval="4000">
            <div class="position-relative">
                <img src="{{ asset('images/foto2.jpg') }}" class="d-block w-100"
                    style="height: 100vh; object-fit: cover;" alt="Virtual Museum">
                <!-- Overlay -->
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center h-100">
                <h1 class="fw-bold display-4">JELAJAHI VIRTUAL MUSEUM</h1>
            </div>
        </div>
    </div>

    {{-- Tombol Navigasi --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#jumbotronCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#jumbotronCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

    {{-- ISI HALAMAN --}}
    <div class="py-5 mt-0 pt-1 w-100">
        @php
            $items = [
                ['gambar' => 'images/foto1.jpg', 'judul' => 'KOLEKSI'],
                ['gambar' => 'images/foto2.jpg', 'judul' => 'EVENT'],
                ['gambar' => 'images/foto1.jpg', 'judul' => 'RUANG PAMER'],
                ['gambar' => 'images/foto2.jpg', 'judul' => 'FASILITAS'],
            ];
        @endphp

        <div class="w-100 px-4">
            <div class="row text-center mt-4">
                @foreach ($items as $item)
                    <div class="col-6 col-md-3 mb-3">
                        <div class="kotak-ikon border-secondary">
                            <div
                                class="ratio ratio-1x1 d-flex justify-content-center align-items-center rounded-3 mb-3 overflow-hidden p-5">
                                <img src="{{ asset($item['gambar']) }}" class="w-100 h-100 object-fit-cover"
                                    alt="{{ $item['judul'] }}">
                            </div>
                            <div class="judul-ikon">{{ $item['judul'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="prosedur mt-4 pt-4 d-flex flex-wrap gap-3 p-4 rounded-3">
                <div class="row">
                    <div class="col-12 col-md-3 d-flex flex-column justify-content-center text-end mb-4 mb-md-0 p-4">
                        <h3>Layanan</h3>
                        <p>
                            SENIN - JUMAT<br>
                            09.00 - 15.00 WIB
                        </p>
                    </div>
                    <div class="col-12 col-md-5 d-flex flex-column justify-content-center text-start mb-4 mb-md-0 p-4">
                        <h4>Prosedur Kunjungan</h4>
                        <ol>
                            <li>Museum Maritim Indonesia hanya menerima kunjungan rombongan minimal 20 peserta.</li>
                            <li>Reservasi kunjungan dapat bersurat ke EGM Regional 2 Tanjung Priok.</li>
                        </ol>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="https://maritimemuseum.id/" target="_blank">
                            <img src="images/virtualmuseum.jpg" alt="Virtual Museum" class="img-fluid">
                        </a>
                        <div class="teks-gambar mt-2">
                            <a href="https://maritimemuseum.id/">VIRTUAL MUSEUM</a>
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
                    <?php for ($i=0; $i < 10; $i++) { ?>
                    <img src="images/museum.jpg" class="img-youtube">
                    <?php } ?>
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
                    <img src="images/ruang-kegiatan.jpg" alt="Gambar Contoh" class="img-fluid custom-img" style="object-fit: cover;">
                </div>
            </div>

        </div>
    </div>

    {{-- Load Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pengunjungChart').getContext('2d');
        const pengunjungChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April'],
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: [10, 15, 8, 12], // Data dummy, bisa diganti dari database
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

    {{-- Berita --}}
    <div class="berita mt-4 px-3 container" style="margin-bottom: 1cm;">
        <h4 class="fw-bold mb-3">Berita</h4>
        <hr>
        <div class="row text-center g-3">
            <?php for ($i = 0; $i < 4; $i++) { ?>
            <div class="col-md-3">
                <div class="bg-light p-3 rounded shadow-sm h-100">
                    <a href="#" class="text-decoration-none d-block h-100">
                        <img src="images/koleksi.jpg" class="img-fluid rounded mb-2"
                            style="height: 180px; object-fit: cover;">
                        <h5 class="text-start text-dark fw-semibold mb-1">Judul Berita</h5>
                        <p class="text-start text-muted mb-2">Tanggal Berita</p>
                        <p class="text-start text-muted small mb-0">Isi Berita</p>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

@endsection
