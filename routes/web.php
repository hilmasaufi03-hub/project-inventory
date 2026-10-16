<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

// Mengarahkan halaman utama web langsung ke manajemen data inventaris
Route::get('/', function () {
    return redirect()->route('inventaris.index');
});

// Pendaftaran rute utama untuk pengelolaan stok barang secara otomatis
Route::resource('inventaris', BarangController::class);