<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(){
        return view('logueo/login');
    }

    public function login_store(Request $request){
        
        $email = request()->email;
        $password = request()->password;

        $remember = ($request->has('remember') ? true : false);
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $request->session()->regenerate();
            return redirect()->route('promovido.create');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
