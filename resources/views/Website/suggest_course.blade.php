@extends('Website.layouts.app')
@section('content')
    <div class="aboutus container mt-5">
        <h1>{{__('الدورات المقترحه')}}</h1>
        <h6>{{__('شرح الدورات التي ترغب بها في المركز التعليمي:')}}</h6>
        <form action="{{route('courses.suggest.post')}}" method="post" class="border-sqar ">
            @csrf
            <h5 class="mb-4 mt-2">{{__('إقترح الدورات التي ترغب بالحصول عليها')}} </h5>
            <div class="mb-3">
                <label for="course_name" class="form-label">{{__('الدوره المقترحه:')}}</label>
                <input type="text" name="course_name" class="form-control" id="course_name">
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">{{__('ملاحظات')}}</label>
                <textarea name="note" class="form-control" id="note" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">{{__('ارسال')}}</button>
        </form>
    </div>
@endsection
