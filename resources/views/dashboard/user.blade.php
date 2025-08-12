{{-- resources/views/beranda.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelindo Virtual Museum</title>

    {{-- Bootstrap & Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Link ke file CSS eksternal --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Header / Navbar --}}
    <header class="bg-pelindo text-white py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="{{ url('/beranda') }}">PELINDO MUSEUM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link text-white" href="{{ url('/beranda') }}">Beranda</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ url('/tentangkami') }}">Tentang
                                Kami</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ url('/berita') }}">Berita</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ url('/kegiatan') }}">Kegiatan</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ url('/koleksi') }}">Koleksi</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-white" href="{{ url('/publikasi') }}">Publikasi</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    {{-- Gambar utama --}}
    <div class="foto">
        <div class="card h-100 shadow-sm">
            <img src="{{ asset('images/museum.jpg') }}" class="card-img-top" alt="museum">
        </div>
    </div>
    {{-- Kategori --}}
    <div class="row text-center mt-5">
        @php
            $kategoris = [
                ['img' => 'koleksi.jpg', 'title' => 'KOLEKSI'],
                ['img' => 'foto2.jpg', 'title' => 'EVENT'],
                ['img' => 'ruang.jpg', 'title' => 'RUANG PAMER'],
                ['img' => 'foto1.jpg', 'title' => 'FASILITAS'],
            ];
        @endphp
        @foreach ($kategoris as $kategori)
            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/' . $kategori['img']) }}" class="card-img-top"
                        alt="{{ $kategori['title'] }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $kategori['title'] }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- dongeng --}}
    <section class="dongeng-section">
        <div class="dongeng-container">
            <!-- Poster Dongeng Maritim -->
            <div class="dongeng-poster">
                <img src="images/dongeng.jpg" alt="Dongeng Maritim">
            </div>
            <!-- YouTube & IG Live -->
            <div class="dongeng-content">
                <h3>YOUTUBE & IG LIVE</h3>
                <div class="gallery-grid">
                    <img src="https://via.placeholder.com/120" alt="img1">
                    <img src="https://via.placeholder.com/120" alt="img2">
                    <img src="https://via.placeholder.com/120" alt="img3">
                    <img src="https://via.placeholder.com/120" alt="img4">
                    <img src="https://via.placeholder.com/120" alt="img5">
                    <img src="https://via.placeholder.com/120" alt="img6">
                    <img src="https://via.placeholder.com/120" alt="img7">
                    <img src="https://via.placeholder.com/120" alt="img8">
                </div>
                <button class="btn-lihat">LIHAT LAINNYA</button>
            </div>
        </div>
    </section>
    {{-- Layanan & Prosedur Kunjungan --}}
    <div class="container my-5">
        <div class="row align-items-stretch">
            <div class="col-md-8">
                <div class="bg-lightblue p-4 h-100 shadow-sm rounded-start d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <h6 class="fw-bold text-uppercase mb-1">LAYANAN</h6>
                            <p class="mb-0">SENIN - JUMAT</p>
                            <p class="mb-0">09.00 - 15.00 WIB</p>
                        </div>
                        <div class="col-md-8">
                            <h6 class="fw-bold">Prosedur Kunjungan</h6>
                            <ol class="ps-3 mb-0">
                                <li>Museum Maritim Indonesia hanya menerima kunjungan rombongan minimal 20 peserta.</li>
                                <li>Reservasi kunjungan dapat bersurat ke EGM Regional 2 Tanjung Priok</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 p-0">
                <a href="http://maritimemuseum.id/" target="_blank" class="position-relative d-block h-100">
                    <img src="{{ asset('images/virtualmuseum.jpg') }}" alt="Virtual Museum"
                        class="img-fluid rounded-end shadow-sm w-100 h-100 object-fit-cover">
                    <div class="virtual-museum-text">VIRTUAL MUSEUM</div>
                </a>
            </div>
        </div>
    </div>

    {{-- kegiatan & kunjungan --}}
    <div class="container my-5">
        <h4 class="mb-4 fw-bold">KEGIATAN dan KUNJUNGAN</h4>
        <div class="row g-4">
            <div class="col-md-8">
                <div class="table-responsive kegiatan-tabel">
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>ACARA</th>
                                <th>WAKTU</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Event<br><strong>Pisah Sambut Wakapolres Pelabuhan Tanjung Priok</strong></td>
                                <td>Kamis, 10-04-2025<br>08:00 s/d 23:00 WIB</td>
                            </tr>
                            <tr class="highlight">
                                <td>2</td>
                                <td>Event<br><strong>Rapat Koordinasi Record Center Kantor Pusat PT PELABUHAN
                                        INDONESIA</strong></td>
                                <td>Senin, 14-04-2025<br>14:00 s/d 17:00 WIB</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Rapat<br><strong>Studi Banding Terkait Penerapan Aplikasi Keuangan</strong></td>
                                <td>Selasa, 15-04-2025<br>09:00 s/d 12:00 WIB</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Event<br><strong>Halal Bi Halal dan Sosialisasi Pengembangan OPS (PT.EPI)</strong>
                                </td>
                                <td>Rabu, 16-04-2025<br>10:00 s/d 12:00 WIB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/ruang-kegiatan.jpg') }}" alt="Kegiatan"
                    class="img-fluid rounded shadow-sm object-fit-cover h-100">
            </div>
        </div>
    </div>

    {{-- Berita --}}
    <section class="berita-container">
        <h4 class="judul-section">BERITA TERKINI</h4>
        <div class="card-wrapper">

            <div class="card-berita">
                <img src="https://via.placeholder.com/300x150" alt="gambar" class="gambar-berita">
                <div class="isi-berita">
                    <a href="#" class="judul-berita">Konservasi Koleksi BMKT mulai bulan Mei 2025.</a>
                    <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever...</p>
                    <div class="ikon-baca"><i class="bi bi-arrow-right-short"></i></div>
                </div>
            </div>

            <div class="card-berita">
                <img src="https://via.placeholder.com/300x150" alt="gambar" class="gambar-berita">
                <div class="isi-berita">
                    <a href="#" class="judul-berita">SD Negeri se-Jakarta berebut datang ke MuMI.</a>
                    <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever...</p>
                    <div class="ikon-baca"><i class="bi bi-arrow-right-short"></i></div>
                </div>
            </div>

            <div class="card-berita">
                <img src="https://via.placeholder.com/300x150" alt="gambar" class="gambar-berita">
                <div class="isi-berita">
                    <a href="#" class="judul-berita">Riset Kapal Karam di Kepulauan Seribu akan dipimpin Tim
                        Museum maritim Indonesia</a>
                    <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever...</p>
                    <div class="ikon-baca"><i class="bi bi-arrow-right-short"></i></div>
                </div>
            </div>

            <div class="card-berita">
                <img src="https://via.placeholder.com/300x150" alt="gambar" class="gambar-berita">
                <div class="isi-berita">
                    <a href="#" class="judul-berita">IG Live NgaburMaritim menjadi Trending Topic di Forum
                        Maritim Dunia.</a>
                    <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever...</p>
                    <div class="ikon-baca"><i class="bi bi-arrow-right-short"></i></div>
                </div>
            </div>

        </div>
    </section>

    {{-- Footer --}}
    <footer class="footer-museum">
        <div class="footer-container">
            <div class="footer-kiri">
                <img src="https://via.placeholder.com/80x60" alt="Museum" class="logo-museum">
                <div class="alamat">
                    <strong>Museum Maritim Indonesia</strong><br>
                    Jl. Pelabuhan No. 9<br>
                    Tanjung Priok<br>
                    Jakarta Utara<br>
                    DKI Jakarta
                </div>
                <div class="tautan">
                    <a href="http://pelindo.co.id" target="_blank">PELINDO.CO.ID</a><br>
                    <a href="http://pmli.co.id" target="_blank">PMLI.CO.ID</a><br>
                    <a href="http://maritimemuseum.id" target="_blank">VIRTUAL MUSEUM</a>
                </div>
            </div>

            <div class="footer-tengah">
                <img src="https://via.placeholder.com/100x100?text=Map" alt="Peta" class="peta">
            </div>

            <div class="footer-kanan">
                <label for="email">Kirim Pesan</label>
                <input type="email" id="email" placeholder="email">
                <textarea id="pesan" rows="3" placeholder="pesan"></textarea>
            </div>
        </div>
    </footer>

    {{-- <footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
      <p class="mb-1">&copy; 2025 Pelindo Virtual Museum. All rights reserved.</p>
      <a href="https://instagram.com" target="_blank" class="text-white me-3">
        <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
      </a>
      <a href="https://facebook.com" target="_blank" class="text-white">
        <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
      </a>
    </div>
  </footer> --}}

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
