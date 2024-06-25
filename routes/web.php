<?php

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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkstrakulikulerController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Profile Routes
Route::middleware('auth:admin')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth:admin')->group(function () {

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}/update', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}/delete', [AdminController::class, 'destroy'])->name('admin.destroy');
});



Route::middleware('auth:admin')->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});


Route::middleware('auth:admin')->group(function () {
Route::get('/siswa/{siswa_id}/ekstrakulikuler/create', [SiswaController::class, 'createEkstrakulikuler'])->name('ekstrakulikuler.create');
Route::post('/siswa/{siswa_id}/ekstrakulikuler/store', [SiswaController::class, 'storeEkstrakulikuler'])->name('ekstrakulikuler.store');
Route::delete('/siswa/{siswa_id}/ekstrakulikuler/{ekstrakulikuler_id}', [SiswaController::class, 'destroyEkstrakulikuler'])->name('ekstrakulikuler.destroy');
Route::get('/siswa/{siswa_id}/ekstrakulikuler/{ekstrakulikuler_id}/edit', [SiswaController::class, 'editEkstrakulikuler'])->name('ekstrakulikuler.edit');
Route::put('/siswa/{siswa_id}/ekstrakulikuler/{ekstrakulikuler_id}/update', [SiswaController::class, 'updateEkstrakulikuler'])->name('ekstrakulikuler.update');
});

Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler.index');



