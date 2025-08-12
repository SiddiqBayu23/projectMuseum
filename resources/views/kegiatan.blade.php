@extends('layout.app')

@section('title', 'kegiatan')

@section('content')

    {{-- Tabel Jadwal Full Lebar dengan Margin 4cm --}}
    <div class="container-fluid my-5" style="padding-left: 4cm; padding-right: 4cm;">

        <!-- JADWAL EVENT DAN KUNJUNGAN -->
        <h4 class="fw-bold mb-4">JADWAL EVENT DAN KUNJUNGAN</h4>
        <div class="d-flex bg-dark text-white fw-bold border p-2">
            <div class="flex-fill">#</div>
            <div class="flex-fill">First</div>
            <div class="flex-fill">Last</div>
            <div class="flex-fill">Handle</div>
        </div>

        <div class="d-flex border-start border-end border-bottom p-2">
            <div class="flex-fill">1</div>
            <div class="flex-fill">Mark</div>
            <div class="flex-fill">Otto</div>
            <div class="flex-fill">@mdo</div>
        </div>
        <div class="d-flex border-start border-end border-bottom p-2">
            <div class="flex-fill">2</div>
            <div class="flex-fill">Jacob</div>
            <div class="flex-fill">Thornton</div>
            <div class="flex-fill">@fat</div>
        </div>
        <div class="d-flex border-start border-end border-bottom p-2">
            <div class="flex-fill">3</div>
            <div class="flex-fill">Larry</div>
            <div class="flex-fill">the Bird</div>
            <div class="flex-fill">@twitter</div>
        </div>
        <div class="d-flex border-start border-end border-bottom p-2">
            <div class="flex-fill">4</div>
            <div class="flex-fill">Larry</div>
            <div class="flex-fill">the Bird</div>
            <div class="flex-fill">@twitter</div>
        </div>

        <!-- PROGRAM MUSEUM -->
        <h4 class="fw-bold my-4">PROGRAM MUSEUM</h4>
        <div class="row g-3">
            <?php for ($i = 0; $i < 4; $i++) { ?>
            <div class="col-md-3 col-sm-6">
                <a href="#" class="text-decoration-none text-dark">
                    <div class="border rounded overflow-hidden h-100">
                        <img src="images/foto2.jpg" class="w-100" style="height: 160px; object-fit: cover;"
                            alt="Gambar Berita">
                        <div class="p-2">
                            <h5 class="mb-1">Judul Berita</h5>
                            <p class="mb-0 text-muted">Isi berita singkat ditampilkan di sini.</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>

        <!-- RUANG -->
        <h4 class="fw-bold my-4">RUANG</h4>
        <div class="border p-3 rounded">
            <div class="row g-3">
                <!-- Gambar Ruangan -->
                <div class="col-md-4">
                    <img src="images/ruang-kegiatan.jpg" alt="Ruang Serbaguna" class="img-fluid rounded">
                </div>

                <!-- Deskripsi Ruangan -->
                <div class="col-md-8">
                    <p class="mb-1"><strong>Ruang Serbaguna</strong></p>
                    <p class="mb-1"><strong>Lokasi:</strong> Lantai 2 Museum Maritim Indonesia</p>
                    <p class="mb-2"><strong>Kapasitas:</strong></p>

                    <!-- Tabel Kapasitas -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-center align-middle mb-3"
                            style="max-width: 500px;">
                            <thead class="table-light">
                                <tr>
                                    <th>Standing</th>
                                    <th>Classroom</th>
                                    <th>Round Table</th>
                                    <th>U-shape</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>200</td>
                                    <td>150</td>
                                    <td>80</td>
                                    <td>120</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Ukuran dan Fasilitas -->
                    <p class="mb-1"><strong>Ukuran Ruang:</strong> 20 meter x 10 meter</p>
                    <p class="mb-0">
                        <strong>Fasilitas:</strong> Sound, Mic 2pcs, Panggung, Backdrop, Meja 8 pcs, Kursi 70 pcs.
                    </p>
                </div>
            </div>
        </div>
    </div>



@endsection
