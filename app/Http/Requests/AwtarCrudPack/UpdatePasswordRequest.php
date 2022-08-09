<?php

namespace App\Http\Requests\AwtarCrudPack;

use App\Http\Requests\NormalRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UpdatePasswordRequest extends NormalRequest
{
    public function preset($crud): Redirector|Application|RedirectResponse
    {
        $Object = (new ($crud->getEntity()))->find($this->id);
        $Object->password = $this->password;
        $Object->save();
        return redirect($crud->getRedirect())->with('status', __('admin.messages.saved_successfully'));
    }
}
