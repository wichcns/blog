<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login.index');
    }
    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email'],
            'password'  =>['required']
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'credentials do not match our records.'
        ]);
    }

    public function logout()
    {
       auth()->logout();
       session()->invalidate();
       session()->regenerateToken();

       return redirect(route('login'));
    }
}
