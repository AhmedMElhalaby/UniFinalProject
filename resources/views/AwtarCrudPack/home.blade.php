@extends('AwtarCrudPack.layouts.app')
@section('top-bar')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6" style="cursor: pointer" onclick="window.location = '{{url('dashboard/course_managements/courses')}}'">
            <div class="card card-stats">
                <div class="card-header" data-background-color="black">
                    <i class="material-icons">cast_for_education</i>
                </div>
                <div class="card-content">
                    <p class="category">{{__('crud.Course.crud_names')}}</p>
                    <h3 class="title">{{\App\Models\Course::count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6" style="cursor: pointer" onclick="window.location = '{{url('dashboard/course_managements/lecturers')}}'">
            <div class="card card-stats">
                <div class="card-header" data-background-color="black">
                    <i class="material-icons">local_library</i>
                </div>
                <div class="card-content">
                    <p class="category">{{__('crud.Lecturer.crud_names')}}</p>
                    <h3 class="title">{{\App\Models\Lecturer::count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats" style="cursor: pointer"  onclick="window.location = '{{url('dashboard/student_managements/students')}}'">
                <div class="card-header" data-background-color="black">
                    <i class="material-icons">school</i>
                </div>
                <div class="card-content">
                    <p class="category">{{__('crud.Student.crud_names')}}</p>
                    <h3 class="title">{{\App\Models\Student::count()}}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
