<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\Admin\CollectionController as AdminCollectionController;
use App\Http\Controllers\Admin\NavbarLinkController as AdminNavbarLinkController;
use App\Http\Controllers\Admin\NavbarSectionController as AdminNavbarSectionController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\StructureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware(['unique.visitor'])->group(function () {

    Route::get('/beranda', [HomeController::class, 'index'])->name('home');

    Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');

    Route::get('/berita', [NewsController::class, 'index'])->name('news');

    Route::get('/kegiatan', [ActivityController::class, 'index'])->name('activity');

    Route::get('/koleksi', [CollectionController::class, 'index'])->name('collection');

    Route::get('/profil', [ProfileController::class, 'index'])->name('profile');

    Route::get('/struktur', [StructureController::class, 'index'])->name('structure');

    Route::get('/publikasi', [PublicationController::class, 'index'])->name('publication');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

        Route::get('/navbar-section', [AdminNavbarSectionController::class, 'index'])->name('admin.navbar-section.index');
        Route::put('/navbar-section/update', [AdminNavbarSectionController::class, 'update'])->name('admin.navbar-section.update');
        Route::post('/navbar-links/store', [AdminNavbarLinkController::class, 'store'])->name('admin.navbar-links.store');
        Route::put('/navbar-links/update', [AdminNavbarLinkController::class, 'update'])->name('admin.navbar-links.update');
        Route::delete('/navbar-links/remove', [AdminNavbarLinkController::class, 'destroy'])->name('admin.navbar-links.remove');

        Route::get('/banners', [AdminBannerController::class, 'index'])->name('admin.banners.index');
        Route::post('/banners/store', [AdminBannerController::class, 'store'])->name('admin.banners.store');
        Route::put('/banners/update', [AdminBannerController::class, 'update'])->name('admin.banners.update');
        Route::delete('/banners/remove', [AdminBannerController::class, 'destroy'])->name('admin.banners.remove');

        Route::get('/collections', [AdminCollectionController::class, 'index'])->name('admin.collections.index');
        Route::post('/collections/store', [AdminCollectionController::class, 'store'])->name('admin.collections.store');
        Route::put('/collections/update', [AdminCollectionController::class, 'update'])->name('admin.collections.update');
        Route::delete('/collections/remove', [AdminCollectionController::class, 'destroy'])->name('admin.collections.remove');

        Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
        Route::post('/news/store', [AdminNewsController::class, 'store'])->name('admin.news.store');
        Route::put('/news/update', [AdminNewsController::class, 'update'])->name('admin.news.update');
        Route::delete('/news/remove', [AdminNewsController::class, 'destroy'])->name('admin.news.remove');

        Route::post('/news/upload-image', [AdminNewsController::class, 'uploadImage'])->name('admin.news.upload-image');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard/user', function () {
        return view('dashboard.user');
    })->name('dashboard.user');
});


Route::get('/kpm', function () {
    return view('klasifikasi.kpm');
});

Route::get('/plakat', function () {
    return view('klasifikasi.plakat');
});

Route::get('/surat', function () {
    return view('klasifikasi.surat');
});
