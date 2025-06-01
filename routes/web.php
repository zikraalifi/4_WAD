<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Redirect halaman utama ke daftar post
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Routing resource untuk post (full CRUD)
// Ganti ->only([...]) jadi full kalau perlu semua fitur
Route::resource('posts', PostController::class);

// Halaman artikel statis
Route::get('/artikel', function () {
    return view('artikel');
});

// Routing untuk profile user (edit, update, delete)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
