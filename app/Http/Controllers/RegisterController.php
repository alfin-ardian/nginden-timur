<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', ['title' => 'Register']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'wa' => ['unique:users', 'required']
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['id_role'] = 4;
        $validatedData['id_dapukan'] = 1;
        $validatedData['status'] = 'H';

        User::create($validatedData);

        return redirect('/')->with('success', 'Selamat! anda telah berhasil mendaftar, silahkan login');
    }
}
