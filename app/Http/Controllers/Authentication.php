<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    public function index(){
        return view('login/login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('auth_error','Email atau Password yang anda masukkan salah!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
