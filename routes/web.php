<?php

use App\Http\Controllers\Admin\{AccountAdminController, AnnouncementAdminController, AuthenticationController, BannerAdminController, DashboardController, EventAdminController, GalleryAdminController, NewsAdminController, PortalAdminController, SchoolAdminController};
use App\Http\Controllers\{AnnouncementController, EventController, GalleryController, LandingpageController, NewsController, ProfileController};
use App\Http\Middleware\SchoolIssetMiddleware;
use Illuminate\Support\Facades\Route;

// Auth Route
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AuthenticationController::class, 'authenticate']);
});
// Route Admin
Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    // Route Sekolah
    Route::resource('school', SchoolAdminController::class)->only('index', 'store');
    // Route Berita
    Route::resource('news', NewsAdminController::class)->except('show');
    // Route Agenda
    Route::resource('agenda', EventAdminController::class)->except('create', 'show')->parameter('agenda', 'event');
    // Route Pengumuman
    Route::resource('announcement', AnnouncementAdminController::class)->except('create', 'show');
    // Route Galeri
    Route::resource('gallery', GalleryAdminController::class)->except('show');
    // Route Portal
    Route::resource('portals', PortalAdminController::class)->except('show', 'create')->parameter('portals', 'portal');
    // Route Banner
    Route::resource('banner', BannerAdminController::class)->only('index', 'create', 'store', 'destroy');
    // Route Akun
    Route::resource('school', SchoolAdminController::class)->only('index', 'store');
    // Route Akun
    Route::resource('account', AccountAdminController::class)->only('index', 'store');
    Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
});
Route::middleware(['guest', SchoolIssetMiddleware::class])->group(function () {
    Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');
    Route::prefix('profile')->middleware(SchoolIssetMiddleware::class)->as('profile.')->group(function () {
        Route::get('history', [ProfileController::class, 'history'])->name('history');
        Route::get('purpose', [ProfileController::class, 'purpose'])->name('purpose');
    });
    Route::resource('news', NewsController::class)->only('index', 'show');
    Route::resource('event', EventController::class)->only('index', 'show');
    Route::resource('announcement', AnnouncementController::class)->only('index', 'show');
    Route::resource('gallery', GalleryController::class)->only('index', 'show');
});
