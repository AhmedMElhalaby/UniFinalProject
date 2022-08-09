<?php

namespace App\Http\Controllers\Dashboard\StudentManagement;

use App\Enums\Gender;
use App\Enums\ScientificGrade;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Traits\AwtarCrudPackTrait;

class StudentController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/student_managements/students');
        $this->setEntity(Student::class);
        $this->setTable('students');
        $this->setLang('Student');
        $this->setColumns([
            'avatar'=> [
                'name'=>'avatar',
                'type'=>'image',
                'is_searchable'=>false,
                'order'=>false
            ],
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'email'=> [
                'name'=>'email',
                'type'=>'email',
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
            'email'=> [
                'name'=>'email',
                'type'=>'email',
                'is_required'=>true,
                'is_unique'=>true
            ],
            'mobile'=> [
                'name'=>'mobile',
                'type'=>'text',
                'is_required'=>true,
                'is_unique'=>true
            ],
            'identity_number'=> [
                'name'=>'identity_number',
                'type'=>'text',
                'is_required'=>true
            ],
            'std_number'=> [
                'name'=>'std_number',
                'type'=>'text',
                'is_required'=>true,
                'is_unique'=>true
            ],
            'password'=> [
                'name'=>'password',
                'type'=>'password',
                'confirmation'=>true,
                'editable'=>false,
                'is_required'=>true,
                'is_required_update'=>false,
                'export'=>false
            ],
            'birthday'=> [
                'name'=>'birthday',
                'type'=>'date',
                'is_required'=>true
            ],
            'gender'=> [
                'name'=>'gender',
                'type'=>'select_enum',
                'enum'=>Gender::cases(),
                'is_required'=>true
            ],
            'scientific_grade'=> [
                'name'=>'scientific_grade',
                'type'=>'select_enum',
                'enum'=>ScientificGrade::cases(),
                'is_required'=>true
            ],
            'address'=> [
                'name'=>'address',
                'type'=>'text',
                'is_required'=>true
            ],
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_required'=>true
            ],
            'avatar'=> [
                'name'=>'avatar',
                'type'=>'image',
                'is_required'=>false,
                'is_required_update'=>false
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

}
