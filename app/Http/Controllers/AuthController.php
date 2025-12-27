<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    
    public function cekLogin(Request $request)
    {
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/');
    }
    else {
        return redirect('/home');
    }
 }
 public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function editpass()
    {
        return view('editpass',["key"=>"users"]);
    }
}
