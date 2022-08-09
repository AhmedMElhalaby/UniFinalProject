@extends('Website.layouts.app')
@section('content')
    <div class="container main5 overflow-hidden" style="min-height: 450px">
        <div class="main5-header wow fadeInDown">
            <p class="header">{{__('أخبارنا')}}</p>
        </div>
        <div class="row">
            @foreach($Articles as $Article)
                <div class="col-4 my-3" style="cursor: pointer" onclick="window.location='{{url('articles/show?article_id='.$Article->id)}}'">
                    <div class="card" style="border-radius:30px;">
                        <img class="card-img-top" src="{{asset($Article->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$Article->title}}</h5>
                            <p class="card-text" style="color: gray">{{str($Article->details)->limit(80).' ...'}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 mt-3">
                {{$Articles->links('vendor.pagination.bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection
