<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedAndActivated
{
    public function handle($request, Closure $next, $guard = 'dashboard')
    {
        if (!Auth::guard('dashboard')->user()) {
            Auth::guard('dashboard')->logout();
            return to_route('dashboard.login');
        }else{
            if(!Auth::guard('dashboard')->user()->is_active){
                Auth::guard('dashboard')->logout();
                return to_route('dashboard.login')->with('error',__('admin.messages.your_account_is_in_active'));
            }
        }
        return $next($request);
    }
}
