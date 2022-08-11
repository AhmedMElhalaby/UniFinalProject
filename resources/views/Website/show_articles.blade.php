@extends('Website.layouts.app')
@section('content')
    <div class="container-fluid p-5 mt-3" style="min-height: 450px">
        <div class="row">
            <div class="col-9">
                <img src="{{asset($Article->image)}}" class="img-fluid" style="height: 350px" alt="">
                <h1 class="h2 mt-3">{{$Article->title}}</h1>
                <p class="mt-3 text-wrap">
                    {{$Article->details}}
                </p>
            </div>
            <div class="col-3">
                <div class="container main5 overflow-hidden" style="min-height: 450px">
                    <div class="main5-header wow fadeInDown">
                        <p class="header">{{__('أخبار آخرى')}}</p>
                    </div>
                    <div class="row">
                        @foreach($OtherArticles as $Article)
                            <div class="col-12 my-3" style="cursor: pointer" onclick="window.location='{{url('articles/show?article_id='.$Article->id)}}'">
                                <div class="card" style="border-radius:30px;">
                                    <img class="card-img-top" src="{{asset($Article->image)}}" style="height: 300px;border-top-left-radius:30px;border-top-right-radius:30px;" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$Article->title}}</h5>
                                        <p class="card-text" style="color: gray">{{str($Article->details)->limit(80).' ...'}}</p>
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
