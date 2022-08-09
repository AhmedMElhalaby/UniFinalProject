<?php

namespace App\Http\Controllers\Dashboard\WebsiteData;

use App\Http\Controllers\Controller;
use App\Http\Requests\AwtarCrudPack\UpdateRequest;
use App\Http\Requests\Dashboard\AppData\Setting\SearchRequest;
use App\Models\Setting;
use App\Traits\AwtarCrudPackTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    use AwtarCrudPackTrait;

    public function setup()
    {
        $this->setRedirect('dashboard/website_data/settings');
        $this->setEntity(Setting::class);
        $this->setTable('settings');
        $this->setLang('Setting');
        $this->setCreate(false);
        $this->setViewIndex('Dashboard.WebsiteData.Setting.index');
        $this->setViewEdit('Dashboard.WebsiteData.Setting.edit');
        $this->setColumns([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>false,
                'order'=>false
            ],
        ]);
        $this->setFields([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_required'=>false
            ],
            'value'=> [
                'name'=>'value',
                'type'=>'textarea',
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'edit',
        ]);
    }

    public function index(SearchRequest $request)
    {
        return $request->preset($this);
    }

    public function update(UpdateRequest $request,$id): RedirectResponse
    {
        $validator = Validator::make($request->all(),$this->FieldsRules(true,$id));
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->preset($this,$id);
    }
}
