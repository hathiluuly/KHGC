<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   
    public function showLogin(){
        return view('home.login');
    }

    public function showRegister(){
        return view('home.register');
    }

    public function register(UserRegistrationRequest $request){


        User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
           
        ]);


        Mail::to($request['email'])->send(new RegistrationConfirmation());

        return redirect()->route('login')->with('success','Đăng ký thành công');

    }

    public function login(LoginRequest $request){
        if(Auth::attempt(['email'=> $request['email'], 'password'=>$request['password']])){
            return redirect()->route('index')->with(Session::flash('loginSuccess', true));
        }
            return redirect()->back()->with('error', 'Tài khoản không tồn tại');
        
    }

    
}
