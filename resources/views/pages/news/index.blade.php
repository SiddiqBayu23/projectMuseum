@extends('layout.app')

@section('title', 'Berita')

@section('content')

    <div class="container my-3">
        <div class="row">
            <!-- Kolom pencarian di sisi kanan -->
            <div class="col search-bar-wrapper text-end">
                <form class="d-flex justify-content-end search-form" role="search"
                    style="max-width: 400px; margin-left: auto;">
                    <div class="input-group">
                        <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
                        {{-- <button class="btn btn-outline-primary search-button" type="submit"> --}}
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="berita mt-4 px-3" style="margin-bottom: 1cm;">
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
                        <p class="text-start text-muted small mb-0">Isi Berita</p>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>


    <!-- Pagination -->
    <div class="row mt-4">
        <div class="col d-flex justify-content-center">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Selanjutnya</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </div>


@endsection
