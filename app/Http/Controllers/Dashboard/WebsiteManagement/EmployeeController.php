<?php

namespace App\Http\Controllers\Dashboard\WebsiteManagement;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Traits\AwtarCrudPackTrait;

class EmployeeController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/website_managements/employees');
        $this->setEntity(Employee::class);
        $this->setTable('employees');
        $this->setLang('Employee');
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
            'password'=> [
                'name'=>'password',
                'type'=>'password',
                'confirmation'=>true,
                'editable'=>false,
                'is_required'=>true,
                'is_required_update'=>false,
                'export'=>false
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
            'change_password',
            'edit',
            'delete',
        ]);
    }

}
