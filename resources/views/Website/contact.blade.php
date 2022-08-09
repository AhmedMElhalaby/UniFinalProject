@extends('Website.layouts.app')
@section('content')

    <div class="aboutus mb-5 container mt-5">
        <h1>{{__('أتصل بنا')}}</h1>
        <h6>{{__('بامكانك الاتصال والتواصل من خلال:')}}</h6>
        <div class="row row-cols-1 row-cols-md-2 row-cols-md-3 g-4 text-center">
            <div class="col">
                <div class="card">
                    <div class="border">
                        <i class="fa-solid fa-location-dot" style="font-size: 60px"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{__('العنوان')}}</h5>
                        <p class="card-text mb-4">{{setting_value('address')}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="border">
                        <i class="fa-solid fa-phone-volume" style="font-size: 60px"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{__('هاتف')}}</h5>
                        <p class="card-text mb-4">{{setting_value('phone')}} - {{setting_value('mobile')}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="border">
                        <i class="fa-solid fa-envelope-open-text" style="font-size: 60px"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{__('البريد الالكتروني')}}</h5>
                        <p class="card-text mb-4">{{setting_value('email')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
