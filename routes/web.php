<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HomeController;
use App\Models\Pinjam;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});
Route::middleware(['auth'])->group(function () {

   Route::get('home', [HomeController::class, 'index'])->name('home');

    // Users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create')->middleware('role:admin');
    Route::post('users', [UserController::class, 'store'])->name('users.store')->middleware('role:admin');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('role:admin');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('role:admin');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('role:admin');

    // Kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create')->middleware('role:admin');
    Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store')->middleware('role:admin');
    Route::get('kategori/{kategori}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit')->middleware('role:admin');
    Route::put('kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update')->middleware('role:admin');
    Route::delete('kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy')->middleware('role:admin');

    // Buku
    Route::get('buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('buku/create', [BukuController::class, 'create'])->name('buku.create')->middleware('role:admin');
    Route::post('buku', [BukuController::class, 'store'])->name('buku.store')->middleware('role:admin');
    Route::get('buku/{buku}', [BukuController::class, 'show'])->name('buku.show');
    Route::get('buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit')->middleware('role:admin');
    Route::put('buku/{buku}', [BukuController::class, 'update'])->name('buku.update')->middleware('role:admin');
    Route::delete('buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy')->middleware('role:admin');

    // Peminjaman
    Route::get('pinjam', [PeminjamanController::class, 'index'])->name('pinjam.index');
    Route::get('pinjam/create', [PeminjamanController::class, 'create'])->name('pinjam.create')->middleware('role:admin');
    Route::post('pinjam', [PeminjamanController::class, 'store'])->name('pinjam.store')->middleware('role:admin');
    Route::get('pinjam/{pinjam}', [PeminjamanController::class, 'show'])->name('pinjam.show');
    Route::get('pinjam/{pinjam}/edit', [PeminjamanController::class, 'edit'])->name('pinjam.edit')->middleware('role:admin');
    Route::put('pinjam/{pinjam}', [PeminjamanController::class, 'update'])->name('pinjam.update')->middleware('role:admin');
    Route::delete('pinjam/{pinjam}', [PeminjamanController::class, 'destroy'])->name('pinjam.destroy')->middleware('role:admin');
});