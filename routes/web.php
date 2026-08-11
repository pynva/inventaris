<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPeminjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController; // <-- Tambahan Controller Barang
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController; // <-- Tambahan Controller Barang
use App\Http\Controllers\PegawaiController; 
use App\Http\Controllers\RekapController;
use Spatie\Activitylog\Models\Activity;

// 1. PUBLIC USER (Langsung Tampil Form Peminjaman)
Route::get('/', [PublicPeminjamanController::class, 'create'])->name('pinjam.create');
Route::get('/pinjam', [PublicPeminjamanController::class, 'create']);
Route::post('/pinjam', [PublicPeminjamanController::class, 'store'])->name('pinjam.store');

// 2. DASHBOARD KHUSUS ADMIN (Wajib Login & Panggil Controller Admin)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. MANAJEMEN BARANG (Khusus Admin / Auth)
Route::middleware(['auth'])->prefix('barang')->name('barang.')->group(function () {

    // Import Excel
    Route::post('/import', [BarangController::class, 'import'])->name('import');

    // CRUD Utama Barang
    Route::get('/', [BarangController::class, 'index'])->name('index');
    Route::post('/', [BarangController::class, 'store'])->name('store');
    Route::put('/{id}', [BarangController::class, 'update'])->name('update');
    Route::delete('/{id}', [BarangController::class, 'destroy'])->name('destroy');

});

// 4. PROFILE ADMIN
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth'])->group(function () {

    // PEMINJAMAN
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])
        ->name('peminjaman.index');

    Route::patch('/peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])
        ->name('peminjaman.approve');

    Route::patch('/peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])
        ->name('peminjaman.reject');


    // PENGEMBALIAN
    Route::get('/pengembalian', [PengembalianController::class, 'index'])
        ->name('pengembalian.index');

    Route::post('/pengembalian/{peminjaman}', [PengembalianController::class, 'store'])
        ->name('pengembalian.store');

    Route::get('/pegawai', [PegawaiController::class, 'index'])
        ->name('pegawai.index');

    Route::post('/pegawai/import', [PegawaiController::class, 'import'])
        ->name('pegawai.import');
    
    Route::post('/pegawai', [PegawaiController::class, 'store'])
    ->name('pegawai.store');

});

// 5. REKAP 
Route::middleware(['auth'])->group(function () {
    Route::get('/rekap-excel', [RekapController::class, 'indexExcel'])->name('rekap.index');
    Route::get('/rekap-excel/export-peminjaman', [RekapController::class, 'exportPeminjaman'])->name('rekap.export.peminjaman');
    Route::get('/rekap-excel/export-pengembalian', [RekapController::class, 'exportPengembalian'])->name('rekap.export.pengembalian');
});

Route::get('/log-activity', function () {
    $logs = Activity::with('causer')->latest()->paginate(10);
    return view('log_activity', compact('logs'));
})->middleware(['auth'])->name('log-activity');

require __DIR__.'/auth.php';

