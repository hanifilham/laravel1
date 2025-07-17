<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController; // Pastikan baris ini ada di atas

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk menampilkan daftar mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mhs-baru');

// Rute untuk menampilkan form insert data mahasiswa
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mhs-insert');

// Rute untuk menyimpan data mahasiswa baru dari form
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mhs-store');

// Rute untuk menghapus data mahasiswa (SUDAH DIKOREKSI)
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

// CATATAN: Jika Anda ingin menambahkan fitur edit/update nanti, rutenya akan seperti ini:
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mhs-edit');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');