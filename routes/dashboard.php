   <?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Auth',
], function() {
    Route::get('login', ['uses' => 'LoginController@showLoginForm','as'=>'dashboard.login']);
    Route::post('login', ['uses' => 'LoginController@login']);
    Route::group([
        'middleware' => 'auth.dashboard',
    ], function() {
        Route::post('logout', ['uses' => 'LoginController@logout','as'=>'dashboard.logout']);
    });
});
Route::group([
    'middleware'  => 'auth.dashboard',
], function() {
    Route::get('/', 'HomeController@index');
    Route::get('locale', 'HomeController@locale');
    Route::group([
        'prefix'=>'website_managements',
        'namespace'=>'WebsiteManagement',
    ],function () {
        Route::resource('employees','EmployeeController');
        Route::patch('employees/update/password',  'EmployeeController@updatePassword');
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
    });

    Route::group([
        'prefix'=>'website_data',
        'namespace'=>'WebsiteData',
    ],function () {
        Route::resource('settings','SettingController')->only(['index','edit','update']);
        Route::resource('advertisements','AdvertisementController');
        Route::resource('articles','ArticleController');
    });
    Route::group([
        'prefix'=>'student_managements',
        'namespace'=>'StudentManagement',
    ],function () {
        Route::resource('students','StudentController');
    });
    Route::group([
        'prefix'=>'course_managements',
        'namespace'=>'CourseManagement',
    ],function () {
        Route::resource('courses','CourseController');
        Route::resource('courses/{id}/applied_students','CourseStudentController');
        Route::get('courses/{course}/applied_students/{id}/paid','CourseStudentController@paid');
        Route::resource('lecturers','LecturerController');
        Route::resource('suggestions','SuggestionController');
    });
});
