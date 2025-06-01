<?php

use App\Http\Controllers\MedicineController;

Route::get('/medicine', [MedicineController::class, 'index']); 
Route::get('/medicine/{id}', [MedicineController::class, 'show']); 
Route::post('/medicine', [MedicineController::class, 'store']); 
Route::put('/medicine/{id}', [MedicineController::class, 'update']); 
Route::delete('/medicine/{id}', [MedicineController::class, 'destroy']); 
