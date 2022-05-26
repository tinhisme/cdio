<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect('/home')->with('status', 'Bạn cần đăng nhập');
        } else {
            if (!in_array($user->role->name, $roles))
                return redirect('/home')->with('status', 'Bạn Không có quyền truy cập vào trang này');
            return $next($request);
        }
    }
}
