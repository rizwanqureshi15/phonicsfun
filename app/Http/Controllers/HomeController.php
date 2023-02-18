<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

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
        return view('home');
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

    public function book_demo()
    {
        return view('design.book_demo');
    }

    public function champcam()
    {
        return view('design.champcam');
    }
}
