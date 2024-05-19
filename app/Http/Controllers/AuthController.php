<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postLogin(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)){
            $request->session('')->regenerate();
            return redirect()->intended('index');
        }

        return back()->withErrors([
            'username' => 'The Provided Credentials Do Not Match Our Records.',
        ])->onlyInput('username');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
