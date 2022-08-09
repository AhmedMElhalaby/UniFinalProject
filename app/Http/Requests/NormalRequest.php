<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class NormalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [];
    }
    public function failedValidation(Validator $validator)
    {
        $error = '';
        foreach ($validator->errors()->all() as $item) {
            $error .= '<li>'.$item.'</li>';
        }
        session()->flash('Error', $error);
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
