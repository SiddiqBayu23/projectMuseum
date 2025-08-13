<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\NavbarLinkController;
use App\Http\Controllers\Admin\NavbarSectionController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\AuthController; //Digunakan untuk login, register, logout.
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Models\NavbarSection;
use Illuminate\Support\Facades\Route; //Agar bisa menggunakan fungsi Route::get(), Route::post(), dsb.

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Berikut ini adalah rute-rute untuk aplikasi web kamu.
| Dipisahkan antara sebelum login dan setelah login.
*/

// =================== HALAMAN UTAMA (ROOT) ===================

// Halaman Utama (root)
Route::get('/', function () {
    return redirect()->route('beranda'); // redirect ke /beranda
});

// =================== SEBELUM LOGIN ===================

// Halaman Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register'); //Menampilkan form register via method showRegister() dari AuthController.
Route::post('/register', [AuthController::class, 'register']);  //Proses data form untuk mendaftar user baru.

// Halaman Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');  //Menampilkan form login via method showLogin().
Route::post('/login', [AuthController::class, 'login']);  //Proses form login untuk autentikasi user


// Menampilkan view resources/views/beranda.blade.php.
Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');


// Tentang Kami
Route::prefix('tentangkami')->group(function () {
    Route::get('/', function () {
        return view('tentangkami');
    })->name('tentangkami');
});

// Berita
Route::prefix('berita')->group(function () {
    Route::get('/', function () {
        return view('berita');
    })->name('berita');
});

// Kegiatan
Route::prefix('kegiatan')->group(function () {
    Route::get('/', function () {
        return view('kegiatan');
    })->name('kegiatan');
});

// Koleksi (bisa diakses tanpa login)
Route::prefix('koleksi')->group(function () {
    Route::get('/', function () {
        return view('koleksi');
    })->name('koleksi');
});

// Profil
Route::get('/profil', function () {
    return view('profil');
})->name('profil');

// Struktur Organisasi
Route::get('/struktur', function () {
    return view('struktur');
})->name('struktur');

// Publikasi
Route::prefix('publikasi')->group(function () {
    Route::get('/', function () {
        return view('publikasi');
    })->name('publikasi');
});

// =================== SETELAH LOGIN ===================
// Semua route di dalam grup ini hanya bisa diakses jika user sudah login (authenticated).
Route::middleware(['auth'])->group(function () {
    // Dashboard Admin
    Route::prefix('admin')->group(function () {
        // Dashboard Admin

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

        Route::get('/navbar-section', [NavbarSectionController::class, 'index'])->name('admin.navbar-section.index');
        Route::put('/navbar-section/update', [NavbarSectionController::class, 'update'])->name('admin.navbar-section.update');
        Route::post('/navbar-links/store', [NavbarLinkController::class, 'store'])->name('admin.navbar-links.store');
        Route::put('/navbar-links/update', [NavbarLinkController::class, 'update'])->name('admin.navbar-links.update');
        Route::delete('/navbar-links/remove', [NavbarLinkController::class, 'destroy'])->name('admin.navbar-links.remove');

        Route::get('/banners', [BannerController::class, 'index'])->name('admin.banners.index');
        Route::post('/banners/store', [BannerController::class, 'store'])->name('admin.banners.store');
        Route::put('/banners/update', [BannerController::class, 'update'])->name('admin.banners.update');
        Route::delete('/banners/remove', [BannerController::class, 'destroy'])->name('admin.banners.remove');

        Route::get('/collections', [CollectionController::class, 'index'])->name('admin.collections.index');
        Route::post('/collections/store', [CollectionController::class, 'store'])->name('admin.collections.store');
        Route::put('/collections/update', [CollectionController::class, 'update'])->name('admin.collections.update');
        Route::delete('/collections/remove', [CollectionController::class, 'destroy'])->name('admin.collections.remove');

        Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
        Route::post('/news/store', [NewsController::class, 'store'])->name('admin.news.store');
        Route::put('/news/update', [NewsController::class, 'update'])->name('admin.news.update');
        Route::delete('/news/remove', [NewsController::class, 'destroy'])->name('admin.news.remove');

        Route::post('/news/upload-image', [NewsController::class, 'uploadImage'])->name('admin.news.upload-image');
    });

    // Dashboard User
    Route::get('/dashboard/user', function () {
        return view('dashboard.user');
    })->name('dashboard.user');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// KALSIFIKASI
// routes/web.php
Route::get('/kpm', function () {
    return view('klasifikasi.kpm');
});

Route::get('/plakat', function () {
    return view('klasifikasi.plakat');
});

Route::get('/surat', function () {
    return view('klasifikasi.surat');
});
