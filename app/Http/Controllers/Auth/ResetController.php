<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResetController extends Controller
{
    public function showResetPassword($token){
        return view('auth.recover-password',['token'=> 'token']);
    }

    public function resetPassword(User $user, ResetPasswordRequest $request){
        $user->update(['password' => bcrypt($request->password),'token'=>null]);

        Session::flash('alert', 'Đặt lại mật khẩu thành công');
      
        return redirect()->route('login');
    }
      
}


