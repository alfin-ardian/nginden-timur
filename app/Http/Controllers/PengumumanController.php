<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Pengumuman.index', [
            'pengumumans' => Pengumuman::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'slug' => 'required|max:255|unique:pengumumans',
            'penulis' => 'required|max:255',
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->isi), 15);

        Pengumuman::create($validatedData);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('Admin.Pengumuman.show', [
            'pengumuman' => $pengumuman
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('Admin.Pengumuman.edit', [
            'pengumuman' => $pengumuman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'slug' => 'required|max:255|unique:pengumumans,slug,' . $pengumuman->id,
            'penulis' => 'required|max:255',
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->isi), 15);

        $pengumuman->update($validatedData);

        return redirect('/admin/pengumuman')->with('success', 'Pengumuman berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect('/admin/pengumuman')->with('success', 'Pengumuman berhasil dihapus');
    }
}
