<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Models\Lesson;

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


    public function calendar()
    {
        //get active subscription
        $user = Auth::guard('web')->user();
        
        return view('users.calendar', compact('user'));
    }


    public function getEvent(Request $request){
        $user = Auth::guard('web')->user();

        $start_date = Carbon::parse($request->start)->format('Y-m-d');
        $end_date = Carbon::parse($request->end)->format('Y-m-d');

        if($user->hasRole('parent')){
            $student_ids = [];
            foreach($user->students as $student){
                array_push($student_ids, $student->id);
            }

            $events = Lesson::with('batch')->whereDate('date', '>=', $start_date)
                        ->whereDate('date', '<=', $end_date)
                        ->whereIn('student_id', $student_ids)
                        ->get();
        }else{
            $events = Lesson::with('batch')->whereDate('date', '>=', $start_date)
                        ->whereDate('date', '<=', $end_date)
                        ->where('teacher_id', $user->id)
                        ->get();
        }
        

        foreach($events as $event){
            $event->title = $event->start_time.' - '.$event->batch->name;
            $event->start = $event->date.' '.$event->start_time;
            $event->end = $event->date.' '.$event->end_time;
            if($event->status == '1'){
                $event->color = '#A3D687';    
            }elseif($event->status == '2'){
                $event->color = '#FF9B9A';
            }
            
        }
        return response()->json($events);
        
    }

    
}