<a href="{{url($redirect.'/'.$object->id.'/activation')}}?{{request()->getQueryString()}}" data-toggle="tooltip" data-placement="bottom" title=" {{($object->is_active)? __('admin.activation.do_in_active') : __('admin.activation.do_active')}}" class="fs-20"><i class="fa {{($object->is_active)? 'fa-window-close' : 'fa fa-check-square'}}"></i></a>