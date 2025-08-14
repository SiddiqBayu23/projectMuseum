@extends('layout.app')

@section('title', 'publikasi')

@section('content')


    <div class="container my-4">
        <div class="row align-items-center justify-content-between">
            <!-- Kiri: Judul dan tombol filter -->
            <div class="col-md-8 d-flex align-items-center flex-wrap gap-2">
                <h6 class="fw-bold mb-0 me-3">PUBLIKASI</h6>
                <button class="btn btn-outline-secondary btn-sm">Jurnal Museum</button>
                <button class="btn btn-outline-secondary btn-sm">Artikel</button>
                <button class="btn btn-outline-secondary btn-sm">Buku Elektronik</button>
            </div>

            <!-- Kanan: Search input -->
            <div class="col-md-4 d-flex justify-content-end">
                <form role="search" class="w-100" style="max-width: 250px;">
                    <div class="input-group input-group-sm">
                        <input type="search" class="form-control" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row g-3">
            <?php for ($i = 0; $i < 2; $i++) { ?>
            <div class="col-md-6 col-sm-12"> <!-- agar 2 card pas 1 layar -->
                <div class="card h-100 shadow-sm border-0">
                    <a href="#" class="text-decoration-none text-dark">
                        <img src="images/foto2.jpg" class="card-img-top" alt="Gambar Berita">
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2">Kategori</span>
                            <h6 class="card-title fw-bold">
                                Museum Maritim Sebagai Bangunan Cagar Budaya
                            </h6>
                            <p class="card-text text-muted" style="font-size: 14px;">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry...
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-end">
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Jarak 3cm antara 2 card dan gambar fullscreen -->
    <div class="w-100" style="margin-top: 1cm;">
        <div class="card border-0 rounded-0 position-relative">
            <a href="#" class="text-decoration-none text-dark">
                <!-- Gambar Fullscreen dengan margin kiri-kanan 5cm -->
                <img src="images/foto2.jpg"
                    style="height: 100vh; width: calc(100% - 10cm); object-fit: cover; margin-left: 5cm; margin-right: 5cm;"
                    alt="Gambar Berita">
                <!-- Isi Card di atas gambar -->
                <div class="card-body position-absolute bottom-0 start-0 text-white bg-dark bg-opacity-50 w-100 p-4"
                    style="padding-left: 5cm; padding-right: 1cm;">
                    <span class="badge bg-light text-dark mb-2">Kategori</span>
                    <h6 class="card-title fw-bold">Museum Maritim Sebagai Bangunan Cagar Budaya</h6>
                    <p class="card-text" style="font-size: 14px;">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry...
                    </p>
                </div>
            </a>
        </div>
    </div>




@endsection
