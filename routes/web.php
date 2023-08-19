<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\TugasController;
use App\Models\Magang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/ajuan', [HomeController::class, 'ajuan'])->name('ajuan');

Route::get('/magang', [MagangController::class, 'index'])->name('magang.store');

Route::middleware('role:admin')->controller(MagangController::class)->prefix('magang')->name('magang.')->group(function() {
    Route::get('/kandidat', 'kandidat')->name('kandidat');
    Route::get('/daftar', 'index')->name('daftar');
    Route::post('/kandidat/{user}', 'terima_kandidat')->name('terima');
});

Route::middleware('role:admin|magang')->controller(TugasController::class)->prefix('tugas')->name('tugas.')->group(function() {
    Route::get('/tambah', 'create')->name('tambah')->middleware('role:admin');
    Route::post('/tambah', 'store')->name('store');
    Route::get('/daftar', 'index')->name('daftar');
});

// Route::middleware('role:admin|magang')->controller(TugasController::class)