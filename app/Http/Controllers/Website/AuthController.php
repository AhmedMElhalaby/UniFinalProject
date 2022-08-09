<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except(['logout','profile','update']);
    }
    protected function guard()
    {
        return Auth::guard('web');
    }
    public function username()
    {
        return 'std_number';
    }
    public function showLoginForm()
    {
        return view('website.auth.login');
    }
}
