<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegistrationConfirmation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
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
}
