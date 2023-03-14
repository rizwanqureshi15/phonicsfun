<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Demo;
use Mail;
use App\Mail\BookDemo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::with('category')->where('is_active', true)->get();
        return view('home', compact('courses'));
    }


    public function home()
    {
        $courses = Course::with('category')->where('is_active', true)->get();
        return view('home', compact('courses'));
    }

    public function about()
    {
        return view('design.about');
    }

    public function courses()
    {
        $courses = Course::with('category')->where('is_active', true)->get();

        return view('courses', compact('courses'));
    }

    public function courseDetail($category_name, $course_name)
    {
        $category_name = str_replace('-', ' ', $category_name);
        $course_name = str_replace('-', ' ', $course_name);
        
        $category = Category::where('name', 'like', '%'. $category_name . '%')->first();
        if(!$category){
            return redirect('/');
        }

        $course = Course::where('category_id', $category->id)
                            ->where('name', 'like', '%'. $course_name . '%')
                            ->where('is_active', true)
                            ->first();

        if(!$course){
            return redirect('/');
        }
        return view('course_detail', compact('course'));
    }

    public function price()
    {
        return view('design.price');
    }

    public function contact()
    {
        return view('design.contact');
    }

    public function teachers()
    {
        return view('design.teachers');
    }

    public function blogs()
    {
        return view('design.blogs');
    }

    public function junior_readers_course()
    {
        return view('design.junior_readers_course');
    }

    public function bookDemo()
    {
        $courses = Course::with('category')->where('is_active', true)->get();

        return view('book_demo', compact('courses'));
    }

    public function champcam()
    {
        return view('design.champcam');
    }

    public function postBookDemo(Request $request){
        
        $rules = [
            'parent_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'kid_name' => 'required',
            'kid_age' => 'required',
            'course_id' => 'required|integer',
        ];

        $request->validate($rules);
        $data = $request->all();

        $demo = Demo::create($data);
        
        $to_email = 'azaz.tarwani10@gmail.com';
        Mail::to($to_email)->send(new BookDemo($demo));

        return back()->with('success', 'Demo booked successfully');
    }
}
