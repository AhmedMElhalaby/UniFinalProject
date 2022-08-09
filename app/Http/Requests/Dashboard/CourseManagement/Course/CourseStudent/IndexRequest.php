<?php

namespace App\Http\Requests\Dashboard\CourseManagement\Course\CourseStudent;

use App\Http\Requests\NormalRequest;

class IndexRequest extends NormalRequest
{
    public function preset($crud,$id){
        $Objects = new ($crud->getEntity());
        $Objects = $Objects->where('course_id',$id);
        foreach ($crud->getFilters() as $filter){
            if ($filter['type'] == 'where'){
                $Objects = $Objects->where($filter['name'],$filter['value']);
            }
            if ($filter['type'] == 'whereIn'){
                $Objects = $Objects->whereIn($filter['name'],$filter['value']);
            }
            elseif ($filter['type'] == 'whereNull'){
                $Objects = $Objects->whereNull($filter['name']);
            }
            elseif ($filter['type'] == 'whereNotNull'){
                $Objects = $Objects->whereNotNull($filter['name']);
            }
        }
        foreach ($crud->getColumns() as $column) if($this->filled($column['name']) && $column['is_searchable']) if ($column['type'] =='text' || $column['type'] =='date') $Objects = $Objects->where($column['name'],'LIKE','%'.$this->{$column['name']}.'%'); else $Objects = $Objects->where($column['name'],$this->{$column['name']});
        if($this->filled('order_by') && $this->filled('order_type')) $Objects = $Objects->orderBy($this->order_by,$this->order_type);
        if ($crud->isPaging()){
            $Objects = $Objects->paginate($this->per_page?:10);
        }else{
            $Objects = $Objects->get();
        }
        return view($crud->getViewIndex(),compact('Objects'))->with($crud->getParams());
    }
}
