<?php

namespace App\Http\Controllers\Dashboard\WebsiteData;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Traits\AwtarCrudPackTrait;

class AdvertisementController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/website_data/advertisements');
        $this->setEntity(Advertisement::class);
        $this->setTable('advertisements');
        $this->setLang('Advertisement');
        $this->setColumns([
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_searchable'=>false,
                'order'=>false
            ],
            'title'=> [
                'name'=>'title',
                'search'=>'title',
                'type'=>'text',
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
            'title'=> [
                'name'=>'title',
                'type'=>'text',
                'is_required'=>true
            ],
            'details'=> [
                'name'=>'details',
                'type'=>'textarea',
                'is_required'=>true
            ],
            'url'=> [
                'name'=>'url',
                'type'=>'url',
                'is_required'=>true
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
            'delete',
        ]);
    }

}
