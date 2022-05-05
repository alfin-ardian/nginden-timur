<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Absensi;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.index', [
            'jadwal' => Jadwal::with('absensi.user')
                ->where('tanggal', date('Y-m-d'))
                ->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return view('Admin.edit', [
            'jadwal' => Jadwal::with(['absensi.user' => function ($query) {
                if (request('search')) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                }
            }])
                ->where('id', $id)
                ->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $data = [];
        for ($i = 0; $i < count($request->user_id); $i++) {
            $data[] = [
                'user_id' => $request['user_id'][$i],
                'presensi' => $request['presensi'][$i]
            ];
        }

        foreach ($data as $absensi) {
            Absensi::where('jadwal_id', $request->jadwal_id)
                ->where('user_id', $absensi['user_id'])
                ->update([
                    'presensi' => $absensi['presensi'],
                    'waktu_absen' => $absensi['presensi'] ? date('Y-m-d H:i:s') : null
                ]);
        }

        return redirect('/admin')->with('success', 'Berhasil mengubah Data');
    }
}
