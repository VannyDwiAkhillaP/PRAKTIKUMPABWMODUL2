
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanBanjirController;

// Halaman utama diarahkan ke form laporan
Route::redirect('/', '/lapor');

// Menampilkan form laporan banjir
Route::get('/lapor', [LaporanBanjirController::class, 'form'])
    ->name('lapor.form');

// Memproses laporan banjir
Route::post('/lapor', [LaporanBanjirController::class, 'kirim'])
    ->name('lapor.kirim');