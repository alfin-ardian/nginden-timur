<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DapukanController;


use App\Models\Absensi;

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

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/admin', function () {
    return view('admin.index', [
        'absensis' => Absensi::with('user')->get(),
    ]);
});

Route::resource('/admin/user', UserController::class);
Route::resource('/admin/dapukan', DapukanController::class);
Route::resource('/admin/jadwal', JadwalController::class);
Route::resource('/admin/laporan/absensi', AbsensiController::class);
