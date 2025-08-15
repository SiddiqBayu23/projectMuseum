<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NavbarLinkController as AdminNavbarLinkController;
use App\Http\Controllers\Admin\NavbarSectionController as AdminNavbarSectionController;
use App\Http\Controllers\Admin\ServiceSectionController as AdminServiceSectionController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\VideoStreamingController as AdminVideoStreamingController;
use App\Http\Controllers\Admin\CollectionCategoryController as AdminCollectionCategoryController;
use App\Http\Controllers\Admin\CollectionController as AdminCollectionController;
use App\Http\Controllers\Admin\PublicationCategoryController as AdminPublicationCategoryController;
use App\Http\Controllers\Admin\PublicationController as AdminPublicationController;
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
    Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

    Route::get('/kegiatan', [ActivityController::class, 'index'])->name('activity');

    Route::get('/koleksi', [CollectionController::class, 'index'])->name('collection');
    Route::get('/koleksi/{slug}', [CollectionController::class, 'show'])->name('collection.show');

    Route::get('/profil', [ProfileController::class, 'index'])->name('profile');

    Route::get('/struktur', [StructureController::class, 'index'])->name('structure');

    Route::get('/publikasi', [PublicationController::class, 'index'])->name('publication');
    Route::get('/publikasi/{slug}', [PublicationController::class, 'show'])->name('publication.show');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', function () {
            return redirect()->route('admin.dashboard.index');
        });

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

        Route::get('/navbar-section', [AdminNavbarSectionController::class, 'index'])->name('admin.navbar-section.index');
        Route::put('/navbar-section/update', [AdminNavbarSectionController::class, 'update'])->name('admin.navbar-section.update');
        Route::post('/navbar-links/store', [AdminNavbarLinkController::class, 'store'])->name('admin.navbar-links.store');
        Route::put('/navbar-links/update', [AdminNavbarLinkController::class, 'update'])->name('admin.navbar-links.update');
        Route::delete('/navbar-links/remove', [AdminNavbarLinkController::class, 'destroy'])->name('admin.navbar-links.remove');

        Route::get('/service-section', [AdminServiceSectionController::class, 'index'])->name('admin.service-section.index');
        Route::put('/service-section/update', [AdminServiceSectionController::class, 'update'])->name('admin.service-section.update');


        Route::get('/banners', [AdminBannerController::class, 'index'])->name('admin.banners.index');
        Route::post('/banners/store', [AdminBannerController::class, 'store'])->name('admin.banners.store');
        Route::put('/banners/update', [AdminBannerController::class, 'update'])->name('admin.banners.update');
        Route::delete('/banners/remove', [AdminBannerController::class, 'destroy'])->name('admin.banners.remove');

        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('/categories/store', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
        Route::put('/categories/update', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/remove', [AdminCategoryController::class, 'destroy'])->name('admin.categories.remove');

        Route::get('/video-streamings', [AdminVideoStreamingController::class, 'index'])->name('admin.video-streamings.index');
        Route::post('/video-streamings/store', [AdminVideoStreamingController::class, 'store'])->name('admin.video-streamings.store');
        Route::put('/video-streamings/update', [AdminVideoStreamingController::class, 'update'])->name('admin.video-streamings.update');
        Route::delete('/video-streamings/remove', [AdminVideoStreamingController::class, 'destroy'])->name('admin.video-streamings.remove');

        Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
        Route::post('/news/store', [AdminNewsController::class, 'store'])->name('admin.news.store');
        Route::put('/news/update', [AdminNewsController::class, 'update'])->name('admin.news.update');
        Route::delete('/news/remove', [AdminNewsController::class, 'destroy'])->name('admin.news.remove');

        Route::get('/collection-categories', [AdminCollectionCategoryController::class, 'index'])->name('admin.collection-categories.index');
        Route::post('/collection-categories/store', [AdminCollectionCategoryController::class, 'store'])->name('admin.collection-categories.store');
        Route::put('/collection-categories/update', [AdminCollectionCategoryController::class, 'update'])->name('admin.collection-categories.update');
        Route::delete('/collection-categories/remove', [AdminCollectionCategoryController::class, 'destroy'])->name('admin.collection-categories.remove');

        Route::get('/publication-categories', [AdminPublicationCategoryController::class, 'index'])->name('admin.publication-categories.index');
        Route::post('/publication-categories/store', [AdminPublicationCategoryController::class, 'store'])->name('admin.publication-categories.store');
        Route::put('/publication-categories/update', [AdminPublicationCategoryController::class, 'update'])->name('admin.publication-categories.update');
        Route::delete('/publication-categories/remove', [AdminPublicationCategoryController::class, 'destroy'])->name('admin.publication-categories.remove');

        Route::get('/collections', [AdminCollectionController::class, 'index'])->name('admin.collections.index');
        Route::post('/collections/store', [AdminCollectionController::class, 'store'])->name('admin.collections.store');
        Route::put('/collections/update', [AdminCollectionController::class, 'update'])->name('admin.collections.update');
        Route::delete('/collections/remove', [AdminCollectionController::class, 'destroy'])->name('admin.collections.remove');

        Route::get('/publications', [AdminPublicationController::class, 'index'])->name('admin.publications.index');
        Route::post('/publications/store', [AdminPublicationController::class, 'store'])->name('admin.publications.store');
        Route::put('/publications/update', [AdminPublicationController::class, 'update'])->name('admin.publications.update');
        Route::delete('/publications/remove', [AdminPublicationController::class, 'destroy'])->name('admin.publications.remove');

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
