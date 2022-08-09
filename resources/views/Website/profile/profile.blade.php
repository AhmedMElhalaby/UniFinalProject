@extends('Website.layouts.app')

@section('content')
    <div class="container" style="min-height: 400px">
        <div class="d-flex align-items-start row" style="margin-top: 50px">
            <div class="nav flex-column col-3" style="padding: 20px">
                <a href="{{route('profile')}}" class="my-2 btn btn-primary" >{{__('الملف الشخصي')}}</a>
                <a href="{{route('profile.courses')}}" class="my-2 btn btn-outline-primary" >{{__('الدورات')}}</a>
                <a href="{{route('logout')}}" class="my-2 btn btn-outline-danger">{{__('تسجيل خروج')}}</a>
            </div>
            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data" class="col-9">
                @csrf
                <div class="row my-4">
                    <div class="col-4"></div>
                    <label for="avatar" class="col-4">
                        <img class="figure-img img-thumbnail" id="avatar-img" src="{{auth()->user()->avatar}}" alt="avatar" style="width: 150px;height: 150px">
                        <input type="file" class="d-none" name="avatar" id="avatar" onchange="avatar_change()">
                    </label>
                    <div class="col-4"></div>
                </div>
                <div class="row my-4">
                    <div class="col-3">
                        <label for="std_number" class=" col-form-label text-md-end">{{ __('الرقم الجامعي') }}</label>
                        <input id="std_number" type="text" disabled class="form-control @error('std_number') is-invalid @enderror" name="std_number" value="{{ old('std_number') ?? auth()->user()->std_number }}" required autocomplete="std_number">
                    </div>
                    <div class="col-5">
                        <label for="name" class="col-form-label text-md-end">{{ __('الاسم') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autocomplete="name">
                    </div>
                    <div class="col-4">
                        <label for="email" class=" col-form-label text-md-end">{{ __('البريد الالكتروني') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? auth()->user()->email }}" required autocomplete="email">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-3">
                        <label for="identity_number" class=" col-form-label text-md-end">{{ __('رقم الهوية') }}</label>
                        <input id="identity_number" type="text" class="form-control @error('identity_number') is-invalid @enderror" name="identity_number" value="{{ old('identity_number') ?? auth()->user()->identity_number }}" required autocomplete="identity_number">
                    </div>
                    <div class="col-3">
                        <label for="birthday" class=" col-form-label text-md-end">{{ __('تاريخ الميلاد') }}</label>
                        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') ?? auth()->user()->birthday }}" required autocomplete="birthday">
                    </div>
                    <div class="col-6">
                        <label for="address" class=" col-form-label text-md-end">{{ __('العنوان') }}</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? auth()->user()->address }}" required autocomplete="address">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-5">
                        <label for="mobile" class="col-form-label text-md-end">{{ __('رقم الجوال') }}</label>
                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') ?? auth()->user()->mobile }}" required autocomplete="mobile">
                    </div>
                    <div class="col-3">
                        <label for="gender" class=" col-form-label text-md-end">{{ __('الجنس') }}</label>
                        <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                            @foreach(\App\Enums\Gender::cases() as $gender)
                                <option value="{{$gender->value}}" @if( old('gender') ?? auth()->user()->gender == $gender->value) selected @endif>{{__('crud.Student.gender_enum.'.$gender->value,[],'ar')}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="scientific_grade" class=" col-form-label text-md-end">{{ __('الدرجة العلمية') }}</label>
                        <select id="scientific_grade" class="form-control @error('scientific_grade') is-invalid @enderror" name="scientific_grade" required>
                            @foreach(\App\Enums\ScientificGrade::cases() as $scientific_grade)
                                <option value="{{$scientific_grade->value}}" @if( old('scientific_grade') ?? auth()->user()->scientific_grade == $scientific_grade->value) selected @endif>{{__('crud.Student.scientific_grade_enum.'.$scientific_grade->value,[],'ar')}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-6">
                        <label for="password" class=" col-form-label text-md-end">{{ __('كلمة المرور') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    </div>
                    <div class="col-6">
                        <label for="password_confirmation" class=" col-form-label text-md-end">{{ __('تأكيد كلمة المرور') }}</label>
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                    </div>
                </div>
                <div class="row">
                    <div class="col-7"></div>
                    <div class="col-5">
                        <input type="submit" style="margin-top: 38px;width: 100%" class="btn btn-primary btn-block" value="حفظ">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function avatar_change() {
            let input = document.getElementById('avatar');
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#avatar-img')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        };
    </script>
@endsection
