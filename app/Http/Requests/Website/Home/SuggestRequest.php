<?php

namespace App\Http\Requests\Website\Home;

use App\Enums\Gender;
use App\Enums\ScientificGrade;
use App\Http\Requests\NormalRequest;
use App\Models\CourseSuggestion;
use Illuminate\Http\RedirectResponse;

class SuggestRequest extends NormalRequest
{
    public function rules(): array
    {
        return [
            'course_name'=>'required|string|max:255',
            'note'=>'required|string|max:255',
        ];
    }

    public function run(): RedirectResponse
    {
        $CourseSuggestion = new CourseSuggestion();
        $CourseSuggestion->student_id = auth()->user()->id;
        $CourseSuggestion->course_name = $this->course_name;
        $CourseSuggestion->note = $this->note;
        $CourseSuggestion->save();
        return redirect()->back()->with('status',__('messages.saved_successfully',[],'ar'));
    }
}
