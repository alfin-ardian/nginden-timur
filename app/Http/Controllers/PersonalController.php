<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
                $query->where('user_id', '1');
            }])->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personal.create', [
            'jadwal' => Jadwal::with(['absensi' => function ($query) {
                $query->where('user_id', '1');
            }])->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Absensi $absensi)
    {
        // return $request;
        // Absensi::create($request->all());
        // $absensi->create($request->all());
        Absensi::create([
            'presensi' => $request->presensi,
            'keterangan' => $request->keterangan,
            'waktu_absen' => date('H:i:s'),
            'user_id' => $request->user_id,
            'jadwal_id' => $request->jadwal_id
        ]);

        return redirect('/personal')->with('success', 'Berhasil Absen');
    }
    // {

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('personal.create', [
            'jadwal' => Jadwal::with(['absensi' => function ($query) {
                $query->where('user_id', '1');
            }])->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('personal.create', [
            'jadwal' => Jadwal::with(['absensi' => function ($query) {
                $query->where('user_id', '1');
            }])->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        // return $request;
        Absensi::where('id', $absensi->id)->update([
            'presensi' => $request->presensi,
            'keterangan' => $request->keterangan,
            'waktu_absen' => date('H:i:s'),
            'user_id' => $request->user_id,
            'jadwal_id' => $request->jadwal_id
        ]);

        return redirect('/personal')->with('success', 'Berhasil Absen');
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
