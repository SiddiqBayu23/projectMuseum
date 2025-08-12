<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Judul Default')</title>

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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link text-white" href="{{ url('/beranda') }}">Beranda</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{ url('/tentangkami') }}">Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{ url('/berita') }}">Berita</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{ url('/kegiatan') }}">Kegiatan</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{ url('/koleksi') }}">Koleksi</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{ url('/publikasi') }}">Publikasi</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="{{ url('/login') }}">Login</a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css" />
</head>
