<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;


Route::get('/', function () {
    return view('welcome');
});

// Route Login Manual 
Route::get('/login', function () {
    return view('auth.login'); // pastikan kamu punya file ini
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// CRUD Dokter dilindungi auth
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // pastikan file resources/views/dashboard.blade.php ada
    })->name('dashboard');

    Route::resource('doctors', DoctorController::class);
});
