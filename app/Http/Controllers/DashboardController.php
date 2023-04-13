<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use App\Models\Lesson;
use App\Models\Batch;
use App\Models\LessonStudent;

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


    public function myJobs(Request $request){
        $user = Auth::guard('web')->user();

        if($user->hasRole('parent')){
            return redirect('/dashboard');
        }


        $jobs = Batch::with('students')->where('teacher_id', $user->id)
                        ->orderBy('id', 'DESC')
                        ->get();
        
        return view('users.my_jobs', compact('jobs'));


    }

    public function lessonsByBatch($batch_id, Request $request){

        $user = Auth::guard('web')->user();

        if($user->hasRole('parent')){
            return redirect('/dashboard');
        }


        $jobs = Lesson::with('batch')
                        ->where('batch_id', $batch_id)
                        ->get();

        $batch = Batch::find($batch_id);

        return view('users.lessons', compact('jobs', 'batch'));
    }


    public function lesson($batch_id, $lesson_id){
        $user = Auth::guard('web')->user();

        if($user->hasRole('parent')){
            return redirect('/dashboard');
        }


        $lesson = Lesson::with('batch')
                        ->where('batch_id', $batch_id)
                        ->where('id', $lesson_id)
                        ->first();

        $lesson_students = LessonStudent::where('lesson_id', $lesson_id)->get();
        return view('users.lesson', compact('lesson', 'lesson_students'));

    }


    public function cancelledLesson(Request $request){
        $user = Auth::guard('web')->user();

        if($user->hasRole('parent')){
            return redirect('/dashboard');
        }


        $lesson = Lesson::find($request->id);
        
        if($lesson){
            $lesson->status = 2;
            $lesson->save();
        }

        return back()->with('success', 'Lesson updated successfully');

    }

    public function completeLesson(Request $request){
        $user = Auth::guard('web')->user();

        if($user->hasRole('parent')){
            return redirect('/dashboard');
        }


        $lesson = Lesson::find($request->id);
        
        if($lesson){
            $lesson->status = 3;
            $lesson->save();
        }

        return back()->with('success', 'Lesson updated successfully');

    }


    public function toggelAttendance(Request $request){
        $user = Auth::guard('web')->user();

        if($user->hasRole('parent')){
            return redirect('/dashboard');
        }


        $lesson_student = LessonStudent::find($request->id);
        
        if($lesson_student){
            $lesson_student->attendance = $request->attendance;
            $lesson_student->save();
        }

        return response(['success' => true,'message'=>'Attendance updated successfully'], 200);

    }

    
}