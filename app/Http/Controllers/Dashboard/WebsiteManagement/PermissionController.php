<?php

namespace App\Http\Controllers\Dashboard\WebsiteManagement;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Traits\AwtarCrudPackTrait;

class PermissionController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/website_managements/permissions');
        $this->setEntity(Permission::class);
        $this->setTable('permissions');
        $this->setLang('Permission');
        $this->setCreate(false);
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
            ],
        ]);
        $this->SetLinks([
//            'edit',
//            'delete',
        ]);
    }

}
