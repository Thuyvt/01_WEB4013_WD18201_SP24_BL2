<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        // Code check authen
//        dd(Auth::user());
        // Láy thông tin user hiện tại đang đăng nhập
        if(Auth::user()->role != 1) {
            // Nếu ko phải admin thì redirect sang 1 trang khác
            dd("Bạn ko có quyền thuwcj hiện");
        }
        return $next($request);
    }
}
