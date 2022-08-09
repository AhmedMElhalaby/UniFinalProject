<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Locale
{
    public function handle(Request $request, Closure $next)
    {
        if (auth('dashboard')->check()){
            app()->setLocale(auth('dashboard')->user()->locale);
        }else if(auth('web')->check()){
            app()->setLocale(auth('web')->user()->locale);
        }else{
            if(session()->has("locale")) {
                app()->setLocale(session()->get("locale"));
            }else{
                app()->setLocale('en');
            }
        }
        return $next($request);
    }
}
