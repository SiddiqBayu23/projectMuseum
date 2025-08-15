@extends('layout.app')

@section('title', 'publikasi')

@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div style="height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $publication->image) }}" class="w-100 h-100"
                            style="object-fit: cover; object-position: center;" alt="Gambar Utama">
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">{{ $publication->category->name }}</span>
                        <h5 class="card-title">{{ $publication->title }}</h5>
                        <p class="text-muted mb-2">Penulis: {{ $publication->author }}</p>
                        <article>
                            {!! $publication->content !!}
                        </article>
                        <a href="{{ $publication->url }}"
                            class="d-inline-block px-3 py-2 bg-primary text-white rounded text-decoration-none"
                            target="_blank">
                            Link Publikasi
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kolom kanan (daftar publikasi) -->
            <div class="col-md-4">
                @foreach ($otherPublications as $otherPublication)
                    <div class="card mb-3">
                        <div style="height: 200px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $otherPublication->image) }}" class="w-100 h-100"
                                style="object-fit: cover; object-position: center;" alt="Thumb">
                        </div>
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2">{{ $otherPublication->category->name }}</span>
                            <h6 class="card-title">
                                <a href="{{ route('publication.show', $otherPublication->slug) }}"
                                    class="text-decoration-none text-dark">
                                    {{ $otherPublication->title }}
                                </a>
                            </h6>
                            <p class="card-text small">
                                {{ Str::limit(strip_tags($otherPublication->content), 150, '...') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
