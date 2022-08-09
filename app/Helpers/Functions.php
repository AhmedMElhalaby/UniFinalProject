<?php

if(!function_exists('setting_value')) {
    function setting_value($key)
    {
        $Setting = (new \App\Models\Setting())->where('key', $key)->first();
        return $Setting->value;
    }
}

if(!function_exists('setting_object')) {
    function setting_object($key)
    {
        $Setting = (new \App\Models\Setting())->where('key', $key)->first();
        return [
            'title'=>$Setting->title,
            'value'=>$Setting->value,
            'image'=>$Setting->image
        ];
    }
}

if(!function_exists('enum_rule')) {
    function enum_rule($array)
    {
        return implode(',',array_column($array,'value'));
    }
}
