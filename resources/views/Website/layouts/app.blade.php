<!DOCTYPE html>
{{--<html dir="{{app()->getLocale() == 'ar'?'rtl':'ltr'}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>جامعة الازهر</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width , initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="this is my page" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('home_assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('home_assets/css/style.css')}}" />
        <style>
            *{
                font-family: 'Cairo', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="Home">
            <div class="NavBar">
                <div class="Fstnav">
                    <div class="container">
                        <div class="row">
                            <div class="col12 col-md-8 d-flex justify-content-center justify-content-md-start align-items-center">
                                <p class="mx-3 text-center">
                                    {{setting_value('phone')}} -
                                    <i class="fa-solid fa-phone-volume"></i>
                                    {{setting_value('mobile')}}
                                </p>
                                <p class="mx-3">
                                    {{setting_value('email')}}
                                    <i class="fa-solid fa-envelope"></i>
                                </p>
                            </div>
                            <div class="col12 col-md-4 d-flex justify-content-center justify-content-md-end align-items-center">
                                <a href="{{setting_value('facebook_url')}}" target="_blank" class="text-white">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="{{setting_value('youtube_url')}}" target="_blank" class="mx-3 text-white">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <nav class="navbar navbar-expand-lg mt-3 pb-4">
                        <div class="container">
                            <a class="navbar-brand" href="{{route('home')}}">{{__('جامعة الازهر')}}</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{__('الرئيسية')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{setting_value('university_url')}}">{{__('صفحة الجامعة')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('home')}}">{{__('صفحه التعليم المستمر')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('courses')}}">{{__('الدورات')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('articles')}}">{{__('أخبار العامه')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('about')}}">{{__('من نحن')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('contact')}}">{{__('اتصل بنا')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        @auth('web')
                                            <a class="nav-link" href="{{route('profile')}}">{{__('الملف الشخصي')}}</a>
                                        @else
                                            <a class="nav-link" href="{{route('login.show')}}">{{__('تسجيل الدخول')}}</a>
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            @yield('content')
            <div class="footer mt-5 overflow-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="mb-5">{{__('جامعة الازهر')}}</h2>
                            <p>{{setting_value('footer_about')}}</p>
                        </div>
                        <div class="col-sm-4">
                            <p class="list-tittle">{{__('روابط الموقع')}}</p>
                            <ul>
                                <li><a href="{{url('/')}}" class="text-white">{{__('الرئيسيه')}}</a></li>
                                <li><a href="{{route('about')}}" class="text-white">{{__('من نحن')}}</a></li>
                                <li><a href="{{route('articles')}}" class="text-white">{{__('المدونه')}}</a></li>
                                <li><a href="{{route('courses')}}" class="text-white">{{__('الدورات')}}</a></li>
                                <li><a href="{{route('courses.suggest')}}" class="text-white">{{__('اقتراح دورة')}}</a></li>
                                <li><a href="{{route('contact')}}" class="text-white">{{__('تواصل معنا')}}</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <p class="list-tittle">{{__('معلومات التواصل')}}</p>
                            <p class="p-footer"> <i class="fa-solid fa-location-dot"></i> {{setting_value('address')}} </p>
                            <p class="p-footer"> <i class="fa-solid fa-phone"></i> {{setting_value('mobile')}}</p>
                            <p class="p-footer"> <i class="fa-solid fa-envelope"></i> {{setting_value('email')}}</p>
                            <p class="p-footer">
                                <a href="{{setting_value('facebook_url')}}" class="text-white" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="{{setting_value('youtube_url')}}" class="text-white" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="last">{{__('جميع الحقوق محوظه لدى جامعة الأزهر')}} {{\Carbon\Carbon::today()->format('Y')}} </div>
        </div>
        <script src="https://kit.fontawesome.com/b3e8a13dea.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('home_assets/js/script.js')}}"></script>
        <script src="{{asset('home_assets/js/popper.js')}}"></script>
        <script src="{{asset('home_assets/js/bootstrap.min.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            function SuccessAlert(message){
                swal({
                    icon: 'success',
                    text: ' ',
                    title: message,
                    button: false,
                    timer: 1500
                })
            }
            function FailAlert(title,message){
                swal({
                    icon: 'error',
                    text: message,
                    title: title,
                    button: {
                        text: "{{__('admin.ok')}}",
                    },
                })
            }
            function ConfirmAlert(title){
                return swal({
                    title: ""+title,
                    text: " ",
                    icon: "warning",
                    buttons: {
                        confirm: {
                            text: "{{__('admin.ok')}}",
                            value: true,
                            visible: true,
                            className: "",
                            closeModal: true
                        },
                        cancel: {
                            text: "{{__('admin.cancel')}}",
                            value: false,
                            visible: true,
                            className: "",
                            closeModal: true,
                        },
                    },
                }).then((confirm_it) => {
                    return !!confirm_it;
                }) ?? false;
            }
            @if (session('error'))
                FailAlert('خطأ','{{ session('error') }}');
            @endif
            @if (session('status'))
                SuccessAlert('{{ session('status') }}');
            @endif
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    FailAlert('خطأ','{{$error}}');
                @endforeach
            @endif
        </script>
    @yield('script')
    </body>
</html>
