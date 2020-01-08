<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        return view('login.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('nip', 'password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
