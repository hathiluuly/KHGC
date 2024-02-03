<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        if(Auth::attempt(['email'=> $request['email'], 'password'=>$request['password'], 'role'=> 'admin'])){
            return redirect()->route('admin')->with(Session::flash('loginSuccess', true));
        }
        if(Auth::attempt(['email'=> $request['email'], 'password'=>$request['password'], 'role'=> 'user'])){
            return redirect()->route('trangchu')->with(Session::flash('loginSuccess', true));
        }
        return redirect()->back()->with('error', 'Tài khoản không tồn tại');
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
