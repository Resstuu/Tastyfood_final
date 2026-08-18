<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [NewsController::class, 'publicIndex'])->name('berita');
Route::get('/berita/{news}', [NewsController::class, 'show'])->name('berita.show');
Route::get('/tentang', fn () => view('tentang'))->name('tentang');
Route::get('/kontak', fn () => view('kontak'))->name('kontak');
Route::post('/kontak/store', [MessageController::class, 'store'])->name('kontak.store');
Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('public.galeri');
Route::get('/galeri/{gallery}', [GalleryController::class, 'show'])->name('public.galeri.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/galery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::post('/galery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::put('/galery/{gallery}', [GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/galery/{gallery}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news');
    Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
    Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    Route::delete('/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::get('/footer', [FooterController::class, 'edit'])->name('admin.footer');
    Route::put('/footer', [FooterController::class, 'update'])->name('admin.footer.update');
});
