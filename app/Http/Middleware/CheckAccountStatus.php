<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
 
        if (Auth::check()&& Auth::user()->role != 'admin') {
            $statusMessages = [
                0 => 'Tài khoản đang chờ phê duyệt',
                2 => 'Tài khoản bị từ chối',
                3 => 'Tài khoản bị khóa'
            ];
            if (array_key_exists(Auth::User()->status->value, $statusMessages)) {
                $errorMessage = $statusMessages[Auth::User()->status->value];
                return redirect()->back()->with('message', $errorMessage);
                Auth::logout();
                return redirect()->route('login');
            }
        return $next($request);


    }
}
}