<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ForgetPasswordRequest;


class ForgotPasswordController extends Controller
{
    public function showForgetPassword(){
        return view('auth.forget-password');
    }

    public function forgetPassword(ForgetPasswordRequest $request){

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request['email'],
            'token' => $token,
            'created_at' => now()
        ]);

        Mail::send('mail.forget-password', ['token' => $token], function($message) use($request){
            $message->to($request['email']);
            $message->subject('Reset Password');
        });

        return redirect()->to(route('forget-password'))->with('success', 'we have send an email to reset password');
    }


}
