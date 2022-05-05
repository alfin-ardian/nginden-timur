<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login', ['title' => 'Login']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (
            Auth::attempt(['email' => $request->email, 'password' => $request->password])
            || Auth::attempt(['wa' => $request->email, 'password' => $request->password])
        ) {
            $request->session()->regenerate();
            User::where('id', Auth::user()->id)->update([
                'last_login' => date('Y-m-d H:i:s'),
            ]);
            if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
                return redirect('/admin');
            } else {
                return redirect('/personal');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
