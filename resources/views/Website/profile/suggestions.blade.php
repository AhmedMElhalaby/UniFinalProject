@extends('Website.layouts.app')

@section('content')
    <div class="container" style="min-height: 400px">
        <div class="d-flex align-items-start" style="margin-top: 50px">
            <div class="nav flex-column col-3 me-3" style="padding: 20px">
                <a href="{{route('profile')}}" class="my-2 btn btn-outline-primary" >{{__('الملف الشخصي')}}</a>
                <a href="{{route('profile.courses')}}" class="my-2 btn btn-outline-primary" >{{__('الدورات')}}</a>
                <a href="{{route('profile.suggestions')}}" class="my-2 btn btn-primary" >{{__('الاقتراحات')}}</a>
                <a href="{{route('logout')}}" class="my-2 btn btn-outline-danger">{{__('تسجيل خروج')}}</a>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                </div>
            </div>
        </div>
    </div>

@endsection
