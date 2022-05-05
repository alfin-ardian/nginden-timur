<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('SuperAdmin.Role.index', [
            'roles' => Roles::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SuperAdmin.Role.create', [
            'roles' => Roles::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Roles::create($request->all());

        return redirect('/admin/role')->with('success', 'Berhasil menambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Roles $roles)
    {
        return view('SuperAdmin.Role.show', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $roles)
    {
        return view('SuperAdmin.Role.edit', [
            'roles' => Roles::all(),
            'role' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles)
    {
        $roles->update($request->all());

        return redirect('/admin/role')->with('success', 'Berhasil mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles)
    {
        $roles->delete();

        return redirect('/admin/role')->with('success', 'Berhasil menghapus Data');
    }
}
