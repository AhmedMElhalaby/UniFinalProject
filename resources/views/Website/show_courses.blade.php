@extends('Website.layouts.app')
@section('content')
    <div class="container mt-5" style="min-height: 450px;">
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset($Course->image)}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$Course->name}}</h5>
                                <p class="card-text">{{$Course->details}}</p>
                                <p class="card-text text-dark"><i class="fa-solid fa-person-chalkboard"></i> <span>{{__('المحاضر :')}}</span> {{$Course->lecturer->name}}</p>
                                <p class="card-text text-dark"><i class="fa-solid fa-calendar-days"></i> <span>{{__('تاريخ البداية :')}}</span> {{$Course->start_date}}</p>
                                <p class="card-text text-dark"><i class="fa-solid fa-calendar-days"></i> <span>{{__('مواعيد الدوره :')}}</span> {{\Carbon\Carbon::parse($Course->lecture_start_time)->format('H:i A')}}</p>
                                @auth('web')
                                    @if(!$Course->is_student())
                                        <p class="card-text"><a href="{{url('courses/subscribe?course_id='.$Course->id)}}" class="btn btn-primary btn-block">{{__('اشترك ')}}</a></p>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
