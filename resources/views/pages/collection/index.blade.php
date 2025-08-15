@extends('layout.app')

@section('title', 'Koleksi')

@section('content')

    <div class="container py-4">
        <div class="row">
            <!-- Kolom kiri -->
            <div class="col-md-3">
                <select class="form-select mb-2">
                    <option selected disabled>Klasifikasi Koleksi</option>
                    @foreach ($categories as $category)
                        <option>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kolom kanan -->
            <div class="col-md-9">
                <!-- Search -->
                <div class="d-flex justify-content-end mb-3">
                    <input type="text" class="form-control w-25" placeholder="search">
                </div>

                <!-- Paragraf -->
                <p class="text-center text-muted">
                    Museum Maritim Indonesia saat ini memiliki total 1400-an koleksi, baik asli maupun replika.
                    Beberapa koleksi museum didapatkan dengan cara hibah, baik dari Kementerian terkait maupun
                    pribadi yang bertemakan Kemaritiman dan Kepelabuhanan
                </p>

                <!-- Grid Koleksi -->
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                    @foreach ($collections as $collection)
                        <div class="col">
                            <div class="card text-center border-0 shadow-sm h-100">
                                <img src="{{ $collection->thumbnail ? asset('storage/' . $collection->thumbnail) : asset('images/default-collection.jpg') }}"
                                    class="w-100" style="height: 180px; object-fit: cover; object-position: center;"
                                    alt="{{ $collection->name }}">

                                <div class="card-footer bg-dark text-white fw-bold">
                                    <a href="{{ route('collection.show', $collection->slug) }}"
                                        class="text-white text-decoration-none">
                                        {{ $collection->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection
