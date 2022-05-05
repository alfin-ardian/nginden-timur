<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $superAdmin)
    {
        $users = User::where('id_role', '<>', 4)->with('roles')->get();
        return view('SuperAdmin.User.index', [
            'superAdmin' => $users,
            'users' => $users,
            'roles' => Roles::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('SuperAdmin.User.create', [
            'users' => User::all(),
            'roles' => Roles::all()
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

        User::where('id', $request->id)->update([
            'id_role' => $request->id_role
        ]);

        return redirect('/admin/superAdmin')->with('success', 'Berhasil menambah Data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $superAdmin)
    {
        return view('SuperAdmin.User.edit', [
            'user' => $superAdmin,
            'users' => User::all(),
            'roles' => Roles::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        User::where('id', $request->id)->update([
            'id_role' => $request->id_role
        ]);

        return redirect('/admin/superAdmin')->with('success', 'Berhasil mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $superAdmin)
    {
        User::destroy($superAdmin->id);

        return redirect('/admin/superAdmin')->with('success', 'Berhasil menghapus Data');
    }
}
