<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', [Controllers\FileController::class, 'index'])->name('home.index');
Route::get('/encrypt', [Controllers\FileController::class, 'showEncrypt'])->name('encrypt.index');
Route::get('/encrypt/add', [Controllers\FileController::class, 'showAddEncrypt'])->name('encrypt.add');
Route::get('/decrypt', [Controllers\FileController::class, 'showDecrypt'])->name('decrypt.index');
Route::get('/all-files', [Controllers\FileController::class, 'showAllFiles'])->name('all-files.index');

Route::post('/file/encrypt', [Controllers\FileController::class, 'encrypt'])->name('file.encrypt');
Route::post('/file/{id}/decrypt', [Controllers\FileController::class, 'decrypt'])->name('file.decrypt');
Route::post('/file/download', [Controllers\FileController::class, 'download'])->name('file.download');
Route::get('/file/{id}/destroy', [Controllers\FileController::class, 'destroy'])->name('file.destroy');

// utils
Route::get('/cache-clear', [Controllers\HelperController::class, 'cacheClear'])->name('cache-clear');

Route::get('/users', [Controllers\UserController::class, 'index'])->name('users.index');
