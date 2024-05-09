<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', [Controllers\FileController::class, 'index'])->name('home');
Route::get('/encrypt', [Controllers\FileController::class, 'showEncrypt'])->name('encypt');
Route::get('/decrypt', [Controllers\FileController::class, 'showDecrypt'])->name('decrypt');
Route::get('/all-files', [Controllers\FileController::class, 'showAllFiles'])->name('all-files');
