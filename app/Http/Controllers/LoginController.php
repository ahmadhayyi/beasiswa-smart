<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function auth(LoginRequest $request){
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
             $request->session()->regenerate();
             return redirect()->intended('/home');
         }
         return back()->with('failed', 'username atau password salah!');
    }
}
