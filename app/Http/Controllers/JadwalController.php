<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jadwal.index', [
            'jadwals' => Jadwal::with('absensi')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJadwalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = Jadwal::create($request->all());

        if ($request->peserta == 'all') {
            $pesertas = User::all();
            foreach ($pesertas as $peserta) {
                Absensi::create([
                    'user_id' => $peserta->id,
                    'jadwal_id' => $jadwal->id
                ]);
            }
        } else if ($request->peserta == 'ibu') {
            $pesertas = User::where([['jenis_kelamin', 'P'], ['status_pernikahan', 'menikah']])
                ->orWhere('status_pernikahan', 'janda')->get();
            foreach ($pesertas as $peserta) {
                Absensi::create([
                    'user_id' => $peserta->id,
                    'jadwal_id' => $jadwal->id
                ]);
            }
        } else if ($request->peserta == 'remaja') {
            $pesertas = User::where('status_pernikahan', 'lajang')->get();
            foreach ($pesertas as $peserta) {
                Absensi::create([
                    'user_id' => $peserta->id,
                    'jadwal_id' => $jadwal->id
                ]);
            }
        }

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        return view('admin.jadwal.show', [
            'jadwal' => $jadwal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin.jadwal.edit', [
            'jadwal' => $jadwal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJadwalRequest  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        Jadwal::where('id', $jadwal->id)->update([
            'nama_sambung' => $request->nama_sambung,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'tempat' => $request->tempat,
            'link' => $request->link,
            'peserta' => $request->peserta,
            'pengajar_pertama' => $request->pengajar_pertama,
            'pengajar_kedua' => $request->pengajar_kedua,
            'pengajar_ketiga' => $request->pengajar_ketiga,
            'materi_pertama' => $request->materi_pertama,
            'materi_kedua' => $request->materi_kedua,
            'materi_ketiga' => $request->materi_ketiga,
        ]);


        return redirect('/admin/jadwal')->with('success', 'Berhasil mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        Jadwal::destroy($jadwal->id);

        return redirect('/admin/jadwal')->with('success', 'Berhasil menghapus jadwal');
    }
}
