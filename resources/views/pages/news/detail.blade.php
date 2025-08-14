@extends('layout.app')

@section('title', 'Tentang Kami')

@section('content')


    {{-- Hero Section --}}
    <div class="d-flex justify-content-center align-items-center overflow-hidden" style="height: 400px;">
        <img src="{{ asset('storage/' . $news->image) }}" alt="museum" class="img-fluid">
    </div>
    {{-- Main Content --}}
    <div class="container my-5">
        <h1 class="fw-bold mb-3">{{ $news->title }}</h1>
        <p class="text-muted mb-4">
            <small>{{ $news->created_at->format('d F Y') }}</small>
        </p>
        <article>
            {!! $news->content !!}
        </article>
    </div>

    @if ($relatedNews->count())
        <div class="container mb-5">
            <h3 class="fw-bold mb-4">Berita Lainnya</h3>
            <div class="row g-3">
                @foreach ($relatedNews as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="bg-light rounded shadow-sm h-100 overflow-hidden">
                            <a href="{{ route('news.show', $item->slug) }}" class="text-decoration-none d-block h-100">
                                <div style="height: 160px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="w-100 h-100" style="object-fit: cover;">
                                </div>
                                <div class="p-3">
                                    <h6 class="fw-semibold text-dark mb-1 text-truncate">{{ $item->title }}</h6>
                                    <p class="text-muted small mb-0">{{ Str::limit($item->summary, 80, '...') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


@endsection
