<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Website'
],function (){
    Route::get('/','HomeController@home')->name('home');
    Route::get('courses','HomeController@courses')->name('courses');
    Route::get('courses/show','HomeController@show_courses')->name('show.courses');
    Route::get('articles','HomeController@articles')->name('articles');
    Route::get('articles/show','HomeController@show_articles')->name('show.articles');
    Route::get('about','HomeController@about')->name('about');
    Route::get('contact','HomeController@contact')->name('contact');

    Route::get('login','AuthController@showLoginForm')->name('login.show');
    Route::post('login','AuthController@login')->name('login');
    Route::group(['middleware' => 'auth:web'],function (){
        Route::get('logout','AuthController@logout')->name('logout');
        Route::get('profile','ProfileController@profile')->name('profile');
        Route::get('profile/courses','ProfileController@courses')->name('profile.courses');
        Route::post('profile/update','ProfileController@update')->name('profile.update');
        Route::get('courses/suggest','HomeController@courses_suggest')->name('courses.suggest');
        Route::post('courses/suggest','HomeController@courses_suggest_post')->name('courses.suggest.post');
        Route::get('courses/subscribe','HomeController@courses_subscribe')->name('subscribe.courses');


    });
});
