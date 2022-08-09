<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Home\LocaleRequest;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('AwtarCrudPack.home');
    }
    public function locale(LocaleRequest $request){
        return $request->run();
    }
}
