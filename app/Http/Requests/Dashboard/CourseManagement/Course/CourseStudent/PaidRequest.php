<?php

namespace App\Http\Requests\Dashboard\CourseManagement\Course\CourseStudent;

use App\Http\Requests\NormalRequest;

class PaidRequest extends NormalRequest
{
    public function preset($crud,$id){
        $Object = (new ($crud->getEntity()))->find($id);
        if(!$Object)
            return $crud->wrongData();
        $Object->is_paid = true;
        $Object->save();
        return redirect()->back()->withInput()->with('status', __('admin.messages.saved_successfully'));
    }
}
