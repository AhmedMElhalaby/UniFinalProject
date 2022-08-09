<?php

namespace App\Http\Requests\AwtarCrudPack;

use App\Http\Requests\NormalRequest;
use App\Models\ModelPermission;
use App\Models\ModelRole;
use App\Models\RolePermission;

class StoreRequest extends NormalRequest
{
    public function preset($crud)
    {
        $Object = new ($crud->getEntity());
        foreach ($crud->getFilters() as $filter){
            if ($filter['type'] == 'where'){
                $Object->{$filter['name']} = $filter['value'];
            }
            elseif ($filter['type'] == 'whereNull'){
                $Object->{$filter['name']} = null;
            }
            elseif ($filter['type'] == 'whereNotNull'){
                $Object->{$filter['name']} = null;
            }
        }
        foreach ($crud->getFields() as $field) {
            if ($field['type'] == 'image' || $field['type'] == 'file' ){
                if($this->hasFile($field['name'])){
                    $attribute_name = $field['name'];
                    $destination_path = "storage/media/";
                    $attribute_value = $field['name'];
                    if ($this->hasFile($attribute_name)) {
                        $file = $this->file($attribute_name);
                        if ($file->isValid()) {
                            $file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                            $file->move($destination_path, $file_name);
                            $attribute_value =  $destination_path.$file_name;
                        }
                    }
                    $Object->{$field['name']} = $attribute_value;
                }
            }
            elseif ($field['type'] == 'multi_checkbox'){
                $MultiCheckboxField[] = $field;
            }
            elseif ($field['type'] == 'images'){
                $ImagesField[] = $field;
            }else {
                if ($this->filled($field['name'])) {
                    $Object->{$field['name']} = $this->{$field['name']};
                }
            }
        }
        $Object->save();
        $Object->refresh();
        if(isset($MultiCheckboxField)){
            foreach ($MultiCheckboxField as $MField){
                if ($this->filled($MField['name'])){
                    foreach ($this->{$MField['name']} as $MValue){
                        $Model = $MField['custom']['RelationModel']['Model'];
                        $Model->{$MField['custom']['RelationModel']['ref_id']} = $MValue;
                        $Model->{$MField['custom']['RelationModel']['id']} = $Object->getId();
                        $Model->save();
                    }
                }
            }
        }
        if($crud->getLang() == 'Employee'){
            if($this->filled('roles')) {
                foreach ($this->roles as $role_id) {
                    $RolePermission = new ModelRole();
                    $RolePermission->model_id= $Object->getId();
                    $RolePermission->role_id = $role_id;
                    $RolePermission->save();
                    foreach (RolePermission::where('role_id', $role_id)->get() as $Permission) {
                        $RolePermission = new ModelPermission();
                        $RolePermission->model_id =$Object->getId();
                        $RolePermission->permission_id = $Permission->permission_id;
                        $RolePermission->save();
                    }
                }
            }
        }
        if($crud->getLang() == 'Employee' || $crud->getLang() == 'Role'){
            if($this->filled('permissions'))
            {
                if ($crud->getLang() == 'Employee'){
                    foreach ($this->permissions as $permission_id){
                        $RolePermission = new ModelPermission();
                        $RolePermission->model_id = $Object->getId();
                        $RolePermission->permission_id = $permission_id;
                        $RolePermission->save();
                    }
                }
                if ($crud->getLang() == 'Role'){
                    foreach ($this->permissions as $permission_id){
                        $RolePermission = new RolePermission();
                        $RolePermission->role_id = $Object->id;
                        $RolePermission->permission_id = $permission_id;
                        $RolePermission->save();
                    }
                }
            }
        }

        return redirect($crud->getRedirect())->with('status', __('admin.messages.saved_successfully'));
    }
}
