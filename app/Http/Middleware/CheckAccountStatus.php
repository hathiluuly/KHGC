<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

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
        $email = $request->input('email');
            
        $user = User::where('email', $email)->first();

 
        if ($user) {
            $statusMessages = [
                0 => 'Tài khoản đang chờ phê duyệt',
                2 => 'Tài khoản bị từ chối',
                3 => 'Tài khoản bị khóa'
            ];
            if (array_key_exists($user->status, $statusMessages)) {
                $errorMessage = $statusMessages[$user->status];
                return redirect()->back()->with('message', $errorMessage);
            }
        return $next($request);


    }
}
}