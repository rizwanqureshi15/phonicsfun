<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
        
    }

    public function index()
    {
        //get active subscription
        $user = Auth::guard('web')->user();
        
        return view('users.dashboard');
    }

}