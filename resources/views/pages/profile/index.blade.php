@extends('layout.app')

@section('title', 'profil')

@section('content')

    {{-- Hero Section --}}
    <section class="hero-placeholder text-center p-0" style="max-height: 45vh; overflow: hidden;">
    <img src="{{ asset('images/museum.jpg') }}" alt="Hero Image" class="img-fluid w-100" 
         style="height: 100%; object-fit: cover; object-position: center;">
</section>
    {{-- Main Content --}}
    <div class="container content my-5 d-flex gap-4">
        {{-- Sidebar --}}
        <div class="sidebar">
            <a href="{{ url('/profil') }}" class="btn btn-outline-primary w-100 mb-2">Profil</a>
            <a href="{{ url('/tentang-kami') }}" class="btn btn-primary w-100 mb-2">Visi dan Misi</a>
            <a href="{{ url('/struktur') }}" class="btn btn-outline-primary w-100 mb-2">Struktur Organisasi</a>
        </div>

        {{-- Visi Misi --}}
        <div class="main-content flex-grow-1">
            <h3>Museum Maritim Indonesia</h3>
            <p>
                Terwujudnya Museum Maritim Indonesia yang representatif dan bertaraf internasional sebagai sumber
                rekreasi,
                edukasi serta informasi dalam melestarikan dan mengkomunikasikan peranan korporasi serta nilai-nilai
                budaya bangsa.
            </p>
        </div>
    </div>
@endsection
