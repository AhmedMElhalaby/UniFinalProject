<?php

namespace App\Http\Controllers\Website;


use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Profile\UpdateRequest;

class ProfileController extends Controller
{
    public function profile(){
        return view('Website.profile.profile');
    }
    public function courses(){
        return view('Website.profile.courses');
    }
    public function suggestions(){
        return view('Website.profile.suggestions');
    }
    public function update(UpdateRequest $request){
        return $request->run();
    }
}
