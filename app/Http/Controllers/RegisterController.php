<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();
        $password = bcrypt($request->input('password'));
        $input['password'] = "$password";

        User::create($input);
        return redirect('login');
    }
}
