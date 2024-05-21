<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::post('/logout', Controllers\LogoutController::class)->name('logout')->middleware('auth');
Route::get('/login', [Controllers\LoginController::class, 'login'])->name('login');
Route::post('/login', [Controllers\LoginController::class, 'authenticate'])->name('login');
Route::get('/register', [Controllers\UserController::class, 'showRegister'])->name('register');
Route::post('/register', [Controllers\UserController::class, 'store'])->name('register.store');
Route::get('/', [Controllers\FileController::class, 'index'])->name('home.index')->middleware('auth');
Route::get('/encrypt', [Controllers\FileController::class, 'showEncrypt'])->name('encrypt.index')->middleware('auth');
Route::get('/encrypt/add', [Controllers\FileController::class, 'showAddEncrypt'])->name('encrypt.add')->middleware('auth');

Route::get('/encrypt/{id}/decrypt', [Controllers\FileController::class, 'showDecryptFromEncrypt'])->name('encrypt.decrypt')->middleware('auth');
Route::get('/decrypt/{id}/encrypt', [Controllers\FileController::class, 'showEncryptFromDecrypt'])->name('decrypt.encrypt')->middleware('auth');

Route::get('/decrypt', [Controllers\FileController::class, 'showDecrypt'])->name('decrypt.index')->middleware('auth');
Route::get('/all-files', [Controllers\FileController::class, 'showAllFiles'])->name('all-files.index')->middleware('auth');

Route::post('/file/encrypt', [Controllers\FileController::class, 'encrypt'])->name('file.encrypt')->middleware('auth');
Route::post('/file/{id}/decrypt', [Controllers\FileController::class, 'decrypt'])->name('file.decrypt')->middleware('auth');
Route::get('/file/{id}/download', [Controllers\FileController::class, 'download'])->name('file.download')->middleware('auth');
Route::get('/file/{id}/destroy', [Controllers\FileController::class, 'destroy'])->name('file.destroy')->middleware('auth');

// utils
Route::get('/cache-clear', [Controllers\HelperController::class, 'cacheClear'])->name('cache-clear');

Route::get('/users', [Controllers\UserController::class, 'index'])->name('users.index');
