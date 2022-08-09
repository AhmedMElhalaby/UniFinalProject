<?php

namespace App\Http\Requests\Dashboard\AppData\Setting;

use App\Http\Requests\NormalRequest;

class SearchRequest extends NormalRequest
{
    public function preset($crud){
        $Objects = new ($crud->getEntity());
        foreach ($crud->getFilters() as $filter) $Objects = $Objects->where($filter['name'],$filter['value']);
        foreach ($crud->getColumns() as $column) if($this->filled($column['name']) && $column['is_searchable']) $Objects = $Objects->where($column['name'],'LIKE','%'.$this->{$column['name']}.'%');
        if($this->filled('order_by') && $this->filled('order_type')) $Objects = $Objects->orderBy($this->order_by,$this->order_type);
        $Objects = $Objects->get();
        return view($crud->getViewIndex(),compact('Objects'))->with($crud->getParams());
    }
}
