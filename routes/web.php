<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalKonsultasiController;

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

// Routes untuk CRUD Jadwal Konsultasi (Web)
Route::resource('jadwal', JadwalKonsultasiController::class);

// Route untuk API (GET semua jadwal atau berdasarkan mahasiswa)
Route::get('api/jadwal', [JadwalKonsultasiController::class, 'apiIndex']);