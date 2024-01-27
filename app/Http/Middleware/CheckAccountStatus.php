<?php

namespace App\Http\Middleware;

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
        $user = Auth::user();

        

        if ($user) {
            $accountStatus = $user->account_status;

            if ($accountStatus === '0') {
                // Tài khoản đang chờ phê duyệt
                return redirect()->route('pending_approval');
            } elseif ($accountStatus === '1') {
                // Tài khoản đã được phê duyệt
                // Cho phép tiếp tục đăng nhập
            } elseif ($accountStatus === '2') {
                // Tài khoản bị từ chối
                return redirect()->route('account_rejected');
            } elseif ($accountStatus === '3') {
                // Tài khoản bị khóa
                return redirect()->route('account_locked');
            } else {
                // Trạng thái không xác định
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}
