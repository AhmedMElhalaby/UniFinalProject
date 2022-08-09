<?php

namespace App\Http\Controllers\Dashboard\CourseManagement;

use App\Http\Controllers\Controller;
use App\Models\CourseSuggestion;
use App\Models\Lecturer;
use App\Models\Student;
use App\Traits\AwtarCrudPackTrait;

class SuggestionController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/course_managements/suggestions');
        $this->setEntity(CourseSuggestion::class);
        $this->setTable('courses_suggestions');
        $this->setLang('CourseSuggestion');
        $this->setColumns([
            'student_id'=> [
                'name'=>'student_id',
                'type'=>'relation',
                'relation'=>[
                    'data'=>Student::all(),
                    'name'=>'name'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'course_name'=> [
                'name'=>'course_name',
                'search'=>'course_name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'note'=> [
                'name'=>'note',
                'search'=>'note',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([]);
        $this->SetLinks([]);
    }
}
