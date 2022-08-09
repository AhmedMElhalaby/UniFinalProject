<?php

namespace App\Http\Controllers\Dashboard\CourseManagement;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Traits\AwtarCrudPackTrait;

class CourseController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/course_managements/courses');
        $this->setEntity(Course::class);
        $this->setTable('courses');
        $this->setLang('Course');
        $this->setColumns([
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_searchable'=>false,
                'order'=>false
            ],
            'name'=> [
                'name'=>'name',
                'search'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'start_date'=> [
                'name'=>'start_date',
                'type'=>'date',
                'is_searchable'=>true,
                'order'=>true
            ],
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_required'=>true
            ],
            'details'=> [
                'name'=>'details',
                'type'=>'textarea',
                'is_required'=>true
            ],
            'location'=> [
                'name'=>'location',
                'type'=>'text',
                'is_required'=>true
            ],
            'lecturer_id'=> [
                'name'=>'lecturer_id',
                'type'=>'relation',
                'relation'=>[
                    'data'=>Lecturer::all(),
                    'name'=>'name'
                ],
                'is_required'=>true
            ],
            'start_date'=> [
                'name'=>'start_date',
                'type'=>'date',
                'col'=>'col-md-6',
                'is_required'=>true,
            ],
            'end_date'=> [
                'name'=>'end_date',
                'type'=>'date',
                'col'=>'col-md-6',
                'is_required'=>true,
            ],
            'course_days'=> [
                'name'=>'course_days',
                'type'=>'number',
                'col'=>'col-md-4',
                'is_required'=>true,
            ],
            'course_hours'=> [
                'name'=>'course_hours',
                'type'=>'number',
                'col'=>'col-md-4',
                'is_required'=>true,
            ],
            'lecture_start_time'=> [
                'name'=>'lecture_start_time',
                'type'=>'time',
                'col'=>'col-md-4',
                'is_required'=>true,
            ],
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_required'=>true
            ],
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>true,
                'is_required_update'=>false
            ],
        ]);
        $this->SetLinks([
            'edit',
            'applied_students'=>[
                'route'=>'applied_students',
                'icon'=>'fa-graduation-cap',
                'lang'=>__('crud.Student.crud_names',[],session('locale')),
                'condition'=>function ($Object){
                    return true;
                }
            ],
            'delete',
        ]);
    }

}
