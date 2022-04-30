<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dapukan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::with(['dapukannya'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'wa' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect('/admin/user')->with('success', 'Berhasil menambah Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
            'dapukan' => Dapukan::all()
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
        $validatedData = $request->validate([
            'name' => 'required',
            'wa' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            // 'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            // 'foto' => $request->foto,
            'status' => 'required',
            'id_role' => 'required',
            'id_dapukan' => 'required',
            'status_pernikahan' => 'required'
        ]);

        $validatedData['password'] = $request->password;

        $user->update($validatedData);

        return redirect('/admin/user')->with('success', 'Berhasil mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/admin/user')->with('success', 'Berhasil menghapus user');
    }
}
