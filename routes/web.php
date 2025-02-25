<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PelanggaranController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store'); 
    Route::get('/login',[LoginRegisterController::class, 'login'])->name('login'); 
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth','admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('/admin/siswa', SiswaController::class);
    Route::get('/admin/akun', [LoginRegisterController::class, 'index'])->name('admin.akun');
    Route::get('/admin/akun/create', [LoginRegisterController::class, 'create'])->name('akun.create');
    Route::post('/admin/akun/create', [LoginRegisterController::class, 'store'])->name('akun.create');

    Route::get('/admin/akun/{id}', [LoginRegisterController::class, 'edit'])->name('akun.edit');

    Route::put('/admin/akun/update/{id}', [LoginRegisterController::class, 'update'])->name('update');


    Route::put('/admin/akun/updateEmail/{id}', [LoginRegisterController::class, 'updateEmail'])->name('UpdateEmail');

    Route::put('/admin/akun/updatePassword/{id}', [LoginRegisterController::class, 'updatePassword'])->name('updatePassword');

    Route::resource('/admin/pelanggaran', PelanggaranController::class);

    Route::delete('/admin/akun/{id}', [LoginRegisterController::class, 'destroy'])->name('akun.destroy');

    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});

