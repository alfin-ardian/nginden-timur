<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Absensi.index', [
            'jadwals' => Jadwal::with('absensi')->orderBy('tanggal', 'ASC')->get()
        ]);
    }
}
