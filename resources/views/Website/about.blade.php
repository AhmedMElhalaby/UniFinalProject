@extends('Website.layouts.app')
@section('content')
    <div class="aboutus container mt-5" style="min-height: 400px">
        <h1>{{__('من نحن')}}</h1>
        <h6>{{setting_object('about')['title']}}</h6>
        <p>
            {{setting_object('about')['value']}}
        </p>
    </div>
@endsection
