@extends('Website.layouts.app')
@section('content')
    <div class="home mt-5 mt-md-2 text-center mb-5">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner container">
                @foreach($Advertisements as $Advertisement)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="row">
                            <div class="col-12 col-md-7 d-flex align-items-center relative">
{{--                                <div class="outer">--}}
{{--                                    {{$Advertisement->title}}--}}
{{--                                </div>--}}
                                <div class="w-100 texts">
                                    <h1>{{$Advertisement->details}}</h1>
                                    <a href="{{$Advertisement->url}}" class="btn sign mt-4">{{__('اضغط هنا')}}</a>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <img src="{{asset($Advertisement->image)}}" class="d-block" alt="logo"/>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="main4 overflow-hidden">
        <div class="main4-header  wow fadeInDown">
            <p class="header">{{__('كيف نعمل؟')}}</p>
        </div>
        <div class="main4-work">
            <div class="works"><img class="back" src="{{asset('home_assets/images/arrow.png')}}" alt="">
                <div class="container">
                    <div class="card ">
                        <div class="card-work"> <img class="odd3"  src="{{asset('home_assets/images/1.png')}}" alt=""><img class="lastimg" src="{{asset('home_assets/images/11.png')}}" alt=""></div>
                        <p>{{__('جمع الأفكار')}}</p>
                    </div>
                    <div class="card">
                        <p>{{__('التخطيط والإبتكار')}}</p>
                        <div class="card-work"> <img class="odd" src="{{asset('home_assets/images/2.png')}}" alt=""><img class="lastimg" src="{{asset('home_assets/images/22.png')}}" alt=""></div>
                    </div>
                    <div class="card">
                        <div class="card-work"> <img class="odd2" src="{{asset('home_assets/images/3.png')}}" alt=""><img class="lastimg" src="{{asset('home_assets/images/33.png')}}" alt=""></div>
                        <p>{{__('التنفيذ الإبداعي')}}</p>
                    </div>
                    <div class="card">
                        <p>{{__('الإختيار والتقييم')}}</p>
                        <div class="card-work"> <img class="odd2" src="{{asset('home_assets/images/4.png')}}" alt=""><img class="lastimg" src="{{asset('home_assets/images/44.png')}}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container main5 overflow-hidden">
        <div class="main5-header wow fadeInDown">
            <p class="header">{{__('جديد دوراتنا')}}</p>
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
        </div>
    </div>
@endsection
