@extends('Website.layouts.app')
@section('content')
    <div class="container main5 overflow-hidden" style="min-height: 450px">
        <div class="main5-header wow fadeInDown">
            <p class="header">{{__('دوراتنا')}}</p>
        </div>
        <div class="row">
            @foreach($Courses as $Course)
                <div class="col-4 my-3">
                    <div class="card" style="border-radius:30px;">
                        <img class="card-img-top" src="{{asset($Course->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$Course->name}}</h5>
                            <p class="card-text" style="color: gray">{{str($Course->details)->limit(50).' ...'}}</p>
                            <a href="{{url('courses/show?course_id='.$Course->id)}}" class="btn btn-primary">{{__('اشترك الان')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 mt-3">
                {{$Courses->links('vendor.pagination.bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection
