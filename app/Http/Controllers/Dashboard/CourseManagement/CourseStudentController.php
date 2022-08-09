<?php

namespace App\Http\Controllers\Dashboard\CourseManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CourseManagement\Course\CourseStudent\IndexRequest;
use App\Http\Requests\Dashboard\CourseManagement\Course\CourseStudent\PaidRequest;
use App\Models\CourseStudent;
use App\Models\Student;
use App\Traits\AwtarCrudPackTrait;

class CourseStudentController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/course_managements/courses/applied_students');
        $this->setEntity(CourseStudent::class);
        $this->setTable('courses_students');
        $this->setLang('CourseStudent');
        $this->setCreate(false);
        $this->setColumns([
            'student_id'=> [
                'name'=>'student_id',
                'type'=>'relation',
                'relation'=>[
                    'data'=>Student::all(),
                    'entity'=>'student',
                    'name'=>'name'
                ],
                'is_searchable'=>true,
                'order'=>true
            ],
            'is_paid'=> [
                'name'=>'is_paid',
                'type'=>'paid',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([

        ]);
        $this->SetLinks([
            'paid'=>[
                'url'=>function($Object){
                    return 'dashboard/course_managements/courses/'.$Object->course_id.'/applied_students/'.$Object->id.'/paid';
                },
                'icon'=>'fa-credit-card-alt',
                'lang'=>__('admin.paid',[],session('locale')),
                'condition'=>function ($Object){
                    return !$Object->is_paid;
                }
            ]
        ]);
    }

    public function index($id, IndexRequest $request)
    {
        return $request->preset($this,$id);
    }

    public function paid($course_id,$id, PaidRequest $request)
    {
        return $request->preset($this,$id);
    }
}
