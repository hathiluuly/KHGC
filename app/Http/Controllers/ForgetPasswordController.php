<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;


class ForgetPasswordController extends Controller
{
    public function showForgetPassword(){
        return view('home.forget-password');
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


    public function showResetPassword($token){
        return view('home.new-password',  ['token' => $token]);
    }

    public function resetPassword(ResetPasswordRequest $request, $token){

        $resetPasswordRow = DB::table('password_resets')->where('token', $token)->first();

        if (!$resetPasswordRow) {
            return redirect()->route('login')->with('error', 'Invalid token');
        }

        $user = User::where('email', $resetPasswordRow->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        // Cập nhật mật khẩu của user
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Xóa token đặt lại mật khẩu từ bảng 'password_resets'
        DB::table('password_resets')->where('token', $token)->delete();

        return redirect()->route('login')->with('success', 'Password reset successfully');

    }
}
