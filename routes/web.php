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
// Route::get('/login', 'App\Http\Controllers\AdminController@showLoginForm')->name('login');
// Route::post('/login', 'App\Http\Controllers\AdminController@login');
// Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
// Route::post('/logout', 'App\Http\Controllers\AdminController@logout')->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Profile Routes
Route::middleware('auth:admin')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// });
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}/update', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}/delete', [AdminController::class, 'destroy'])->name('admin.destroy');


// Auth routes untuk login dan logout
// require __DIR__.'/auth.php';
use App\Http\Controllers\SiswaController;

Route::middleware('auth:admin')->group(function () {
    // Route untuk daftar siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    // Route untuk tambah siswa
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    // Route untuk detail siswa
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
    // Route untuk edit siswa
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    // Route untuk hapus siswa
    Route::delete('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});



Route::get('/siswa/{siswa_id}/ekstrakulikuler/create', [SiswaController::class, 'createEkstrakulikuler'])->name('ekstrakulikuler.create');
Route::post('/siswa/{siswa_id}/ekstrakulikuler/store', [SiswaController::class, 'storeEkstrakulikuler'])->name('ekstrakulikuler.store');
