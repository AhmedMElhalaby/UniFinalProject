<?php

namespace App\Http\Requests\AwtarCrudPack;

use App\Http\Requests\NormalRequest;

class DestroyRequest extends NormalRequest
{
    public function run($crud){
        $Object = (new ($crud->getEntity()))->find($this->id);
        $Object->delete();
        return redirect($crud->getRedirect())->with('status', __('admin.messages.deleted_successfully'));
    }
}
