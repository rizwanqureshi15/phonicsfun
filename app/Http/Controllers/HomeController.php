<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('design.home');
    }

    public function about()
    {
        return view('design.about');
    }

    public function courses()
    {
        return view('design.courses');
    }

    public function price()
    {
        return view('design.price');
    }

    public function contact()
    {
        return view('design.contact');
    }
}
