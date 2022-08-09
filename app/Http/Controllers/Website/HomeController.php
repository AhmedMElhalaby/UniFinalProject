<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Home\SuggestRequest;
use App\Models\Advertisement;
use App\Models\Article;
use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $Advertisements = (new Advertisement())->where('is_active',true)->get();
        $Courses = (new Course())->where('is_active',true)->take(6)->get();
        return view('Website.home',compact('Advertisements','Courses'));
    }
    public function courses(){
        $Courses = (new Course())->where('is_active',true)->paginate(9);
        return view('Website.courses',compact('Courses'));
    }
    public function show_courses(Request $request){
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);
        $Course = (new Course())->find($request->course_id);
        return view('Website.show_courses',compact('Course'));
    }
    public function courses_subscribe(Request $request){
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);
        CourseStudent::create([
            'course_id'=>$request->course_id,
            'student_id'=>auth()->user()->id
        ]);

        return redirect()->back()->with('status',__('messages.saved_successfully',[],'ar'));
    }
    public function articles(){
        $Articles = (new Article())->where('is_active',true)->paginate(9);
        return view('Website.articles',compact('Articles'));
    }
    public function show_articles(Request $request){
        $request->validate([
            'article_id' => 'required|exists:articles,id',
        ]);
        $Article = (new Article())->find($request->article_id);
        $OtherArticles = (new Article())->where('id','!=',$request->article_id)->take(4)->get();
        return view('Website.show_articles',compact('Article','OtherArticles'));
    }
    public function courses_suggest(){
        return view('Website.suggest_course');
    }
    public function courses_suggest_post(SuggestRequest $request){
        return $request->run();
    }
    public function about(){
        return view('Website.about');
    }
    public function contact(){
        return view('Website.contact');
    }
}
