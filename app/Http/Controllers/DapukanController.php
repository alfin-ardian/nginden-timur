<?php

namespace App\Http\Controllers;

use App\Models\Dapukan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDapukanRequest;
use App\Http\Requests\UpdateDapukanRequest;

class DapukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Dapukan.index', [
            'dapukans' => Dapukan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Dapukan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDapukanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        Dapukan::create($validatedData);
        return redirect('/admin/dapukan')->with('success', 'Berhasil menambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dapukan  $dapukan
     * @return \Illuminate\Http\Response
     */
    public function show(Dapukan $dapukan)
    {
        return view('Admin.Dapukan.show', [
            'dapukan' => $dapukan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dapukan  $dapukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Dapukan $dapukan)
    {
        return view('Admin.Dapukan.edit', [
            'dapukan' => $dapukan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDapukanRequest  $request
     * @param  \App\Models\Dapukan  $dapukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dapukan $dapukan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        $dapukan->update($validatedData);
        return redirect('/admin/dapukan')->with('success', 'Berhasil mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dapukan  $dapukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dapukan $dapukan)
    {
        Dapukan::destroy($dapukan->id_dapukan);

        return redirect('/admin/dapukan')->with('success', 'Berhasil menghapus data');
    }
}
