@extends('layout.app')

@section('title', 'Struktur')

@section('content')

    <!-- Main Content -->
    <div class="container content my-5 d-flex gap-4">

        <!-- Sidebar -->
        <div class="sidebar">
            <a href="{{ url('/profil') }}" class="btn btn-outline-primary w-100 mb-2">Profil</a>
            <a href="{{ url('/tentang-kami') }}" class="btn btn-outline-primary w-100 mb-2">Visi dan Misi</a>
            <a href="{{ url('/struktur') }}" class="btn btn-primary w-100 mb-2">Struktur Organisasi</a>
        </div>

        <!-- Struktur Organisasi -->
        <div class="main-content flex-grow-1">
            <h3 class="mb-4 text-center">STRUKTUR ORGANISASI MUSEUM MARITIM INDONESIA</h3>

            <!-- Foto Struktur Organisasi -->
            <div class="text-center">
                <img src="{{ asset('images/strukturorganisasi.jpg') }}" alt="Struktur Organisasi Museum Maritim Indonesia"
                    class="img-fluid" style="max-height: 600px; object-fit: contain;">
            </div>
        </div>

    </div>

@endsection
