@extends('Website.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 138px;margin-bottom: 138px">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: rgb(64, 64, 195);color: white;">{{ __('تسجيل الدخول') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="std_number" class="col-md-4 col-form-label text-md-end">{{ __('الرقم الجامعي') }}</label>

                            <div class="col-md-8">
                                <input id="std_number" type="text" class="form-control @error('std_number') is-invalid @enderror" name="std_number" value="{{ old('std_number') }}" required autocomplete="std_number" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-primary float-start">
                                    {{ __('تسجيل الدخول') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
