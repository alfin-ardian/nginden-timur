<?php

use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DapukanController;
use App\Http\Controllers\PersonalController;

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

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index', [
            'jadwal' => Jadwal::with('absensi.user')
                ->where('tanggal', date('Y-m-d'))
                ->first()
        ]);
    });
    Route::resource('/user', UserController::class);
    Route::resource('/dapukan', DapukanController::class);
    Route::resource('/jadwal', JadwalController::class);
    Route::resource('/laporan/absensi', AbsensiController::class);
});

Route::prefix('personal')->group(function () {
    Route::resource('/', PersonalController::class);
    Route::get('/riwayat', function () {
        return view('personal.riwayat');
    });
    Route::get('/akun', function () {
        return view('personal.akun', [
            // 'user' => User::where('id', Auth::user()->id)->first()
            'user' => User::where('id', 1)->first()
        ]);
    });
    Route::get('/pengumuman', function () {
        return view('personal.pengumuman', [
            // 'user' => User::where('id', Auth::user()->id)->first()
            'jadwal' => User::where('id', 1)->first()
        ]);
    });
});
