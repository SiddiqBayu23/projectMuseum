@extends('layout.app')

@section('title', 'Koleksi')

@section('content')

    <div class="container my-5">
        <div class="row">
            <!-- Bagian Gambar -->
            <div class="col-md-6">
                <!-- Gambar Utama -->
                <div class="mb-3 border" style="width: 100%; height: 300px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $collection->thumbnail) }}"
                        class="w-100 h-100 object-fit-cover object-position-center" alt="{{ $collection->name }}">
                </div>

                <!-- Gambar Thumbnail -->
                <div class="row g-2">
                    @foreach ($collection->images as $images)
                        <div class="col-3">
                            <div class="border" style="width: 100%; height: 80px; overflow: hidden;">
                                <img src="{{ asset('storage/' . $images->image) }}"
                                    class="w-100 h-100 object-fit-cover object-position-center"
                                    alt="Thumb {{ $loop->iteration }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Bagian Detail -->
            <div class="col-md-6">
                <h4 class="fw-bold">{{ $collection->name }}</h4>

                <p><strong>No. Inv:</strong> {{ $collection->no_inv }}</p>
                <p><strong>Klasifikasi Koleksi:</strong> {{ $collection->category->name }}</p>

                <!-- Ukuran -->
                <h6 class="mt-4 fw-bold">Ukuran :</h6>
                <table class="table table-bordered w-auto">
                    <thead class="table-light">
                        <tr>
                            <th>Panjang</th>
                            <th>Lebar</th>
                            <th>Tinggi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $collection->length }} cm</td>
                            <td>{{ $collection->width }} cm</td>
                            <td>{{ $collection->height }} cm</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Bahan & Warna -->
                <p><strong>Bahan:</strong> {{ $collection->material }}</p>
                <p><strong>Warna:</strong> {{ $collection->color }}</p>
                <p><strong>Cara Perolehan:</strong> {{ $collection->acquisition_method }}</p>

                <!-- Deskripsi -->
                <h6 class="fw-bold">Deskripsi</h6>
                <p>
                    {{ $collection->description }}
                </p>

                <!-- Fungsi -->
                <h6 class="fw-bold">Fungsi</h6>
                <p>
                    {{ $collection->function }}
                </p>
            </div>
        </div>
    </div>

@endsection
