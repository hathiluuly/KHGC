<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        return view('home.login');
    }

    public function login(LoginRequest $request){
        if(Auth::attempt(['email'=> $request['email'], 'password'=>$request['password']])){
            return redirect()->route('index')->with(Session::flash('loginSuccess', true));
        }
            return redirect()->back()->with('error', 'Tài khoản không tồn tại');
        
    }
}
