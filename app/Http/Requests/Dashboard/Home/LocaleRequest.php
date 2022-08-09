<?php

namespace App\Http\Requests\Dashboard\Home;

use App\Enums\Locale;
use App\Http\Requests\NormalRequest;
use Illuminate\Http\RedirectResponse;

class LocaleRequest extends NormalRequest
{
    public function run(): RedirectResponse
    {
        $employee = auth('dashboard')->user();
        if($employee->locale == Locale::Ar->value){
            session()->put('locale', Locale::En->value);
        }else{
            session()->put('locale', Locale::Ar->value);
        }
        app()->setLocale(session()->get('locale'));
        $employee->locale = session()->get('locale');
        $employee->save();
        return redirect()->back();
    }
}
