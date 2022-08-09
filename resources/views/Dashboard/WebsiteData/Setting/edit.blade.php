@extends('AwtarCrudPack.crud.main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.edit')}} {{__(('crud.'.$lang.'.crud_the_name'))}}</h4>
                </div>
                <div class="card-content">
                    <form action="{{url($redirect.'/'.$Object->id)}}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="row">
                            @if($Object->type == \App\Enums\SettingType::Page)
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label for="title" class="control-label">{{__('crud.'.$lang.'.title')}} *</label>
                                        <input type="text" id="title" name="title" required class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{$Object->title}}">
                                    </div>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label for="value" class="control-label">{{__('crud.'.$lang.'.value')}} *</label>
                                        <textarea id="value" name="value" required class="form-control {{ $errors->has('value') ? ' is-invalid' : '' }}">{{$Object->value}}</textarea>
                                    </div>
                                    @if ($errors->has('value'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label for="value" class="control-label">{{__('crud.'.$lang.'.value')}} *</label>
                                        <textarea id="value" name="value" required class="form-control {{ $errors->has('value') ? ' is-invalid' : '' }}">{{$Object->value}}</textarea>
                                    </div>
                                    @if ($errors->has('value'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('value') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="row submit-btn">
                            <button type="submit" class="btn btn-primary" style="margin-left:15px;margin-right:15px;">{{__('admin.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        function permissionCheck() {
            let roleEls = document.getElementsByClassName('role');
            let permissionEls = document.getElementsByClassName('permission');
            for (let p = 0;p<permissionEls.length;p++){
                // permissionEls[p].checked=false;
                permissionEls[p].disabled=false;
            }
            for (let r = 0;r<roleEls.length;r++){
                let roleEl = roleEls[r];
                let permission = RolePermission[roleEl.id];
                for(let i = 0; i < permission.length; i++){
                    let permissionEl = document.getElementById('permission'+permission[i]);
                    if(roleEl.checked){
                        permissionEl.checked=true;
                        permissionEl.disabled=true;
                    }
                }
            }

        }
        permissionCheck();
    </script>
@endpush
