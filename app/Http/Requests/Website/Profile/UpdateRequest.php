<?php

namespace App\Http\Requests\Website\Profile;

use App\Enums\Gender;
use App\Enums\ScientificGrade;
use App\Http\Requests\NormalRequest;
use Illuminate\Http\RedirectResponse;

class UpdateRequest extends NormalRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:students,email,'.auth()->user()->id,
            'mobile'=>'required|string|unique:students,mobile,'.auth()->user()->id,
            'identity_number'=>'required|string|unique:students,identity_number,'.auth()->user()->id,
            'password'=>'nullable|string|min:6|max:20|confirmed',
            'birthday'=>'required|date',
            'gender'=>'required|in:'.enum_rule(Gender::cases()),
            'scientific_grade'=>'required|in:'.enum_rule(ScientificGrade::cases()),
            'address'=>'required|string|max:255',
            'avatar'=>'nullable|mimes:png,jpg,jpeg'
        ];
    }

    public function run(): RedirectResponse
    {
        $student = auth()->user();
        $student->name = $this->name;
        $student->email = $this->email;
        $student->mobile = $this->mobile;
        $student->identity_number = $this->identity_number;
        $student->birthday = $this->birthday;
        $student->gender = $this->gender;
        $student->scientific_grade = $this->scientific_grade;
        $student->address = $this->address;
        if ($this->hasFile('avatar')){
            $file = $this->file('avatar');
            if ($file->isValid()) {
                $file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                $file->move("storage/avatar/", $file_name);
                $student->avatar = "storage/avatar/".$file_name;
            }
        }
        if ($this->filled('password')){
            $student->password = $this->password;
        }
        $student->save();
        $student->refresh();
        return redirect()->back()->with('status',__('messages.saved_successfully',[],'ar'));
    }
}
