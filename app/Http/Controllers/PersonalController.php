<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Jadwal;
use App\Models\Absensi;
use App\Models\Pengumuman;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('Personal.index', [
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
        // return $request;
        $validatedData = $request->validate([
            'presensi' => 'required',
            'keterangan' => 'required',
        ]);

        $validatedData['waktu_absen'] = date('Y-m-d H:i:s');
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['jadwal_id'] = $request->jadwal_id;

        return Absensi::where('id', $request->id)->update($validatedData);
    }

    public function riwayat()
    {
        return view('Personal.riwayat', [
            'jadwals' => Jadwal::with(['absensi' => function ($query) {
                return $query->where('user_id', Auth::user()->id)->get();
            }])->whereMonth('created_at', date('m'))
                ->get()
        ]);
    }

    public function pengumuman()
    {
        return view('Personal.Pengumuman.index', [
            'pengumumans' => Pengumuman::all()
        ]);
    }

    public function pengumumanDetail($id)
    {
        return view('Personal.Pengumuman.show', [
            'pengumuman' => Pengumuman::find($id)
        ]);
    }
}
