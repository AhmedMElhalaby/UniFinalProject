<?php

namespace App\Http\Controllers\Dashboard\WebsiteManagement;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Traits\AwtarCrudPackTrait;

class RoleController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/website_managements/roles');
        $this->setEntity(Role::class);
        $this->setTable('roles');
        $this->setLang('Role');
        $this->setColumns([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_required'=>true
            ]
        ]);
        $this->SetLinks([
            'edit',
        ]);
    }

}
