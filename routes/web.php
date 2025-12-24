<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk/{slug}', [HomeController::class, 'show'])->name('product.detail');
Route::get('/katalog', [HomeController::class, 'shop'])->name('shop');
Route::get('/cara-pemesanan', function () {return view('pages.cara-pemesanan');})->name('cara-pemesanan');
Route::get('/kontak', function () {return view('pages.kontak');})->name('kontak');

Route::fallback(function () {
    return redirect()->route('home');
});
