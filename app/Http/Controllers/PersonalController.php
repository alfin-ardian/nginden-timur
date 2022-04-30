<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Absensi;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('personal.index', [
            'jadwal' => Jadwal::with(['absensi' => function ($query) {
                $query->where('user_id', Auth::user()->id)->first();
            }])
                ->where('tanggal', date('Y-m-d'))
                ->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Absensi::create([
            'presensi' => $request->presensi,
            'keterangan' => $request->keterangan,
            'waktu_absen' => date('Y-m-d H:i:s'),
            'user_id' => $request->user_id,
            'jadwal_id' => $request->jadwal_id
        ]);

        return redirect('/personal')->with('success', 'Berhasil Absen');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Absensi::where('id', $request->id)->update([
            'presensi' => $request->presensi,
            'keterangan' => $request->keterangan,
            'waktu_absen' => date('Y-m-d H:i:s'),
            'user_id' => $request->user_id,
            'jadwal_id' => $request->jadwal_id
        ]);

        return redirect('/personal')->with('success', 'Selamat, Absensi Telah Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
