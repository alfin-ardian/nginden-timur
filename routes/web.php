<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DapukanController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PersonalUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['user'])->prefix('personal')->group(function () {
    Route::get('/', [PersonalController::class, 'index']);
    Route::put('/', [PersonalController::class, 'update']);
    Route::resource('/user', PersonalUserController::class);
    Route::get('/riwayat', [PersonalController::class, 'riwayat']);
    Route::get('/pengumuman', [PersonalController::class, 'pengumuman']);
    Route::get('/pengumuman/{id}', [PersonalController::class, 'pengumumanDetail']);
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::resource('/', AdminController::class);
    Route::get('/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::resource('/user', UserController::class);
    Route::resource('/dapukan', DapukanController::class);
    Route::resource('/jadwal', JadwalController::class);
    Route::resource('/laporan/absensi', AbsensiController::class);
    Route::resource('/pengumuman', PengumumanController::class);
});

Route::resource('/admin/role', RolesController::class)->middleware('superAdmin');
Route::resource('/admin/superAdmin', SuperAdminController::class)->middleware('superAdmin');
