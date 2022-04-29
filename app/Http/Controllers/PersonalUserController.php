<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dapukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personal.user.index', [
            'user' => User::where('id', Auth::user()->id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('personal.user.edit', [
            'user' => User::where('id', Auth::user()->id)->first(),
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
            'email' => 'required',
            'wa' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'status_pernikahan' => 'required'
        ]);

        $user->update($validatedData);

        // User::where('id', $user->id)->update($request->all());

        return redirect('/personal/user')->with('success', 'Berhasil update data');
    }
}
