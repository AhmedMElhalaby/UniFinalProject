@extends('Website.layouts.app')

@section('content')
    <div class="container" style="min-height: 400px">
        <div class="d-flex align-items-start" style="margin-top: 50px">
            <div class="nav flex-column col-3 me-3" style="padding: 20px">
                <a href="{{route('profile')}}" class="my-2 btn btn-outline-primary" >{{__('الملف الشخصي')}}</a>
                <a href="{{route('profile.courses')}}" class="my-2 btn btn-primary" >{{__('الدورات')}}</a>
                <a href="{{route('logout')}}" class="my-2 btn btn-outline-danger">{{__('تسجيل خروج')}}</a>
            </div>
            <div class="col-9">
                <div class="main5 overflow-hidden">
                    <div class="main5-header wow fadeInDown">
                        <p class="header">{{__('جديد دوراتنا')}}</p>
                    </div>
                    <div class="row">
                        @foreach(auth()->user()->courses() as $Course)
                            <div class="col-4 my-3">
                                <div class="card" style="border-radius:30px;cursor: pointer" onclick="window.location='{{url('courses/show?course_id='.$Course->id)}}'">
                                    <img class="card-img-top" src="{{asset($Course->image)}}" style="height: 300px;border-top-left-radius:30px;border-top-right-radius:30px;" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$Course->name}}</h5>
                                        <p class="card-text" style="color: gray">{{str($Course->details)->limit(30).' ...'}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
