@extends('AwtarCrudPack.crud.main')
@section('title') | {{__('admin.show')}} {{__('crud.'.$lang.'.crud_the_name')}} @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.show')}} {{__(('crud.'.$lang.'.crud_the_name'))}}</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        @foreach($Fields as $Field)
                            @if(isset($Field['editable']))
                                @if($Field['editable'])
                                    @if($Field['type'] != 'multi_checkbox' && $Field['type'] != 'images')
                                        {!! \App\Traits\AwtarCrudPackTrait::Fields($Field,$Object->{$Field['name']},$lang) !!}
                                    @else
                                        {!! \App\Traits\AwtarCrudPackTrait::Fields($Field,$Object,$lang) !!}
                                    @endif
                                @endif
                            @else
                                @if($Field['type'] != 'multi_checkbox' && $Field['type'] != 'images')
                                    {!! \App\Traits\AwtarCrudPackTrait::Fields($Field,$Object->{$Field['name']},$lang) !!}
                                @else
                                    {!! \App\Traits\AwtarCrudPackTrait::Fields($Field,$Object,$lang) !!}
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $('input').attr('disabled','disabled');
        $('select').attr('disabled','disabled');
        $('textarea').attr('disabled','disabled');
    </script>
@endpush
