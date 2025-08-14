@extends('layout.app')

@section('title', 'Tentang Kami')

@section('content')


    {{-- Hero Section --}}
    <div class="foto">
        {{-- <div class="card"> --}}
        <img src="{{ asset('images/museum.jpg') }}" class="card-img-top" alt="museum">
        {{-- </div> --}}
    </div>
    {{-- Main Content --}}
    <div class="container content my-5 d-flex gap-4">
        {{-- Sidebar --}}
        <div class="sidebar">
            <a href="profil" class="btn btn-outline-primary w-100 mb-2">Profil</a>
            <a href="/tentang-kami" class="btn btn-primary w-100 mb-2">Visi dan Misi</a>
            <a href="struktur" class="btn btn-outline-primary w-100 mb-2">Struktur Organisasi</a>
        </div>

        {{-- Visi Misi --}}
        <div class="main-content flex-grow-1">
            <h3>VISI</h3>
            <p>
                Terwujudnya Museum Maritim Indonesia yang representatif dan bertaraf internasional sebagai sumber rekreasi,
                edukasi serta informasi dalam melestarikan dan mengkomunikasikan peranan korporasi serta nilai-nilai budaya
                bangsa.
            </p>

            <h3>MISI</h3>
            <ul>
                <li>Mewujudkan pengelolaan koleksi sesuai standar internasional.</li>
                <li>Meningkatkan sarana promosi dan motivasi generasi muda dalam rangka mewujudkan Indonesia sebagai poros
                    maritim dunia.</li>
                <li>Meningkatkan pemahaman sejarah dan nilai budaya kemaritiman dalam memperkuat jati diri Indonesia sebagai
                    negara maritim terbesar di dunia.</li>
                <li>Melestarikan dan mengembangkan Museum Maritim Indonesia secara berkelanjutan dalam rangka memberikan
                    informasi yang lengkap untuk tujuan pendidikan dan rekreasi.</li>
                <li>Mengkomunikasikan identitas, peranan dan kontribusi korporasi terhadap pembangunan negeri.</li>
                <li>Memberikan fasilitas kepada pegawai Pelindo Grup dan publik dalam melakukan riset dan mengembangkan
                    pengetahuan kepelabuhanan, maritim dan pelayaran nusantara melalui perpustakaan dan museum.</li>
            </ul>
        </div>
    </div>


@endsection
