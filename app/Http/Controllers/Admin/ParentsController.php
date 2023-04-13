<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use DB;
use Storage;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;
use App\Models\Student;
use App\Models\Course;
use App\Models\Batch;
use App\Models\Lesson;
use App\Models\BatchStudent;
use App\Models\LessonStudent;
use Yajra\DataTables\DataTables;

class ParentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.parents.index');
    }

    public function getParents()
    {

        $parents = User::whereHas('roles', function($query) {
           $query->where('name', 'parent');
        });

        return Datatables::of($parents)
                ->editColumn('created_at', function($user){
					return $user->created_at->diffForHumans();
				})
                ->editColumn('image', function($parent){
                    return '<img class="img-thumbnail" src="'.Storage::url("parents/". $parent->image) .'" width="50px;" height="50px;">';
                })
                 ->addColumn('action', function ($parent) {
                     return '<div class="btn-group">
                                <a href="'. url("admin/parents/$parent->id/show").'" class="btn btn-primary" title="show"><i class="cil-description"></i></a>
                                <a href="'. url("admin/parents/$parent->id/edit").'" class="btn btn-primary" title="edit"><i class="cil-pencil"></i></a>
                        </div>';
                        // <a href="'. url("admin/parents/$parent->id").'" class="btn btn-danger btn-delete-record" title="delete" data-id="'.$parent->id.'"><i class="cil-trash"></i></a> 
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
    }

    public function create()
    {
    	$genders = User::getAllGenders();
        return view('admin.parents.create', compact('genders'));
    }
    
    public function store(Request $request){
        
        $rules = [
            'name' => 'required',
            'password' => 'required|min:6|max:16',
	        'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
            // 'date_of_birth' => 'required',
            'gender' => 'required',
            // 'qualification' => 'required',
            // 'image' => 'required',
        ];

        //email_verified_at default done

        $request->validate($rules);
        $data = $request->all();
        $data['email_verified_at'] = date('Y-m-d H:i:s');
        $data['password']  = bcrypt($data['password']);

        if($request->hasfile('image'))
        {
            $image = $request->image;
            $filename  = time().rand(0,9999999).'.'.$image->getClientOriginalExtension();  
            $filePath = 'parents' . DIRECTORY_SEPARATOR . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($image));

            $requestArr['image'] = $filename;
        }

        $parent = User::create($data);

        $parent->roles()->attach(2);

        return redirect('admin/parents')->with('success', 'Parent added successfully');
    }


    public function show($id)
    {
        $parent = User::find($id);
        if(!$parent){
            return redirect('admin/parents');
        }

        $genders = User::getAllGenders();
        $students = Student::where('parent_id', $parent->id)->get();
        return view('admin.parents.show', compact('genders', 'parent', 'students'));
    }

    public function edit($id)
    {
        $parent = User::find($id);
        if(!$parent){
            return redirect('admin/parents');
        }

        $genders = User::getAllGenders();
        return view('admin.parents.edit', compact('genders', 'parent'));
    }


    public function update($id, Request $request){
        $rules = [
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            // 'date_of_birth' => 'required',
            'gender' => 'required',
            // 'qualification' => 'required',
        ];

        if($request->password){
        	$rules['password']  = 'required|min:6|max:16';	
        }
        

        $request->validate($rules);

        $parent = User::find($id);
    
        $requestArr = $request->all();

        // if($request->password){
        // 	$requestArr['password']  = bcrypt($requestArr['password']);	
        // }
        
        
        if($parent){
            $oldImage = ($parent)?$parent->getRawOriginal('image'):'';
            
            $parent->update($requestArr);  

            if($request->hasFile('image')){
           
                $image = $request->image;
                $filename  = time().rand(0,9999999).'.'.$image->getClientOriginalExtension();   
                $filePath = 'parents' . DIRECTORY_SEPARATOR . $filename;
                Storage::disk('public')->put($filePath, file_get_contents($image));
                
                $parent->image = $filename;
                $parent->save();  

                $oldImagePath = 'parents' . DIRECTORY_SEPARATOR . $oldImage;
                if(Storage::disk('public')->exists($oldImagePath)){
                    Storage::disk('public')->delete($oldImagePath);
                }                   
            }   
        }
        
        return redirect('admin/parents')->with('success', 'parent updated successfully!');
    }
    
    public function destroy($id) {
        $parent = User::find($id);
        
        if ($parent) {
            //delete 
            $oldImagePath = 'parents' . DIRECTORY_SEPARATOR . $parent->getRawOriginal('image');
            if(Storage::disk('public')->exists($oldImagePath)){
                Storage::disk('public')->delete($oldImagePath);
            } 

            //delete student
            Student::where('parent_id', $parent->id)->delete();
            $parent->roles()->detach();
            $parent->delete();

            return redirect('admin/parents')->with('success', 'parent deleted successfully!');
            
        } else {
            return redirect('admin/parents')->with('error', 'No data found!');
        }
    }


    public function addStudent(Request $request){

        $rules = [
            'name' => 'required',
            'parent_id' => 'required|integer',
        ];

        $request->validate($rules);
        $data = $request->all();

        $student = Student::create($data);

        return back()->with('success', 'Student added successfully');
    }


    public function assignCourses(){
        $students = Student::all();
        $courses = Course::where('is_active', true)->get();
        $teachers = User::whereHas('roles', function($query) {
           $query->where('name', 'teacher');
        })->get();
        
        return view('admin.parents.assign_courses', compact('courses', 'teachers', 'students'));
    }


    public function postAssignCourses(Request $request){

        $rules = [
            'name' => 'required',
            'amount' => 'required',
            'tutor_rate' => 'required',
            'student_ids' => 'required',
            'teacher_id' => 'required|integer',
            'course_id' => 'required|integer',
        ];

        $request->validate($rules);
        $data = $request->all();

        if($request->start_time == $request->end_time){
            return back()->with('error', 'Start and End time should not be same.');
        }

        $days = 0;
        if($request->monday){
            $days++;
        }

        if($request->tuesday){
            $days++;
        }
        if($request->wednesday){
            $days++;
        }
        if($request->thursday){
            $days++;
        }
        if($request->friday){
            $days++;
        }
        if($request->saturday){
            $days++;
        }

        if($request->sunday){
            $days++;
        }

        $course = Course::find($request->course_id);

        if($course->classes_per_week != $days){
            return back()->with('error', 'Select week '.$course->classes_per_week .' days');
        }

        //create batch
        $batchData['name'] = $request->name;
        $batchData['teacher_id'] = $request->teacher_id;
        $batchData['course_id'] = $request->course_id;
        $batchData['amount'] = $request->amount;
        $batchData['tutor_rate'] = $request->tutor_rate;
        
        if(count($request->student_ids) == 1){
            $batchData['is_one_on_one'] = true;
        }
        
        $batch = Batch::create($batchData);

        foreach ($request->student_ids as $key => $student_id) {
            $students[$key]['batch_id'] = $batch->id;
            $students[$key]['student_id'] = $student_id;
            $students[$key]['created_at'] = date('Y-m-d H:i:s');
            $students[$key]['updated_at'] = date('Y-m-d H:i:s');
        }
        
        BatchStudent::insert($students);
        
        $dates = [];
        $start_day = strtolower(Carbon::parse($request->start_date)->dayName);
        
        if($request->monday && 'monday' == $start_day){
            $start_date1 = Carbon::parse($request->start_date)->format('Y-m-d');
        }
        elseif($request->tuesday && 'tuesday' == $start_day){
            $start_date1 = Carbon::parse($request->start_date)->format('Y-m-d');
        }

        elseif($request->wednesday && 'wednesday' == $start_day){
            $start_date1 = Carbon::parse($request->start_date)->format('Y-m-d');
        }

        elseif($request->thursday && 'thursday' == $start_day){
            $start_date1 = Carbon::parse($request->start_date)->format('Y-m-d');
        }

        elseif($request->friday && 'friday' == $start_day){
            $start_date1 = Carbon::parse($request->start_date)->format('Y-m-d');
        }

        elseif($request->saturday && 'saturday' == $start_day){
            $start_date1 = Carbon::parse($request->start_date)->format('Y-m-d');
        }
        elseif($request->sunday && 'sunday' == $start_day){
            $start_date1 = Carbon::parse($request->start_date)->format('Y-m-d');
        }

        for ($i=0; $i < $course->total_classes ; $i++) {
            if($request->monday){
                array_push($dates, Carbon::parse($request->start_date)->addWeeks($i)->next('monday')->format('Y-m-d'));
            }

            if($request->tuesday){
                array_push($dates, Carbon::parse($request->start_date)->addWeeks($i)->next('tuesday')->format('Y-m-d'));
            }

            if($request->wednesday){
                array_push($dates, Carbon::parse($request->start_date)->addWeeks($i)->next('wednesday')->format('Y-m-d'));
            }

            if($request->thursday){
                array_push($dates, Carbon::parse($request->start_date)->addWeeks($i)->next('thursday')->format('Y-m-d'));
            }

            if($request->friday){
                array_push($dates, Carbon::parse($request->start_date)->addWeeks($i)->next('friday')->format('Y-m-d'));
            }

            if($request->saturday){
                array_push($dates, Carbon::parse($request->start_date)->addWeeks($i)->next('saturday')->format('Y-m-d'));
            }

            if($request->sunday){
                array_push($dates, Carbon::parse($request->start_date)->addWeeks($i)->next('sunday')->format('Y-m-d'));
            }
            
        }
        array_unshift($dates , $start_date1);
        sort($dates);
        
        //create lessons
        // create total number of events
        for ($i=0; $i < $course->total_classes ; $i++) { 
            $lessonData['teacher_id'] = $request->teacher_id;
            $lessonData['course_id'] = $request->course_id;
            $lessonData['batch_id'] = $batch->id;
            $lessonData['date'] = $dates[$i];
            $lessonData['start_time'] = $request->start_time;
            $lessonData['end_time'] = $request->end_time;
            $lessonData['status'] = 0;
            
            $lesson = Lesson::create($lessonData);

            foreach ($request->student_ids as $key => $student_id) {
                $lessonStudents[$key]['lesson_id'] = $lesson->id;
                $lessonStudents[$key]['student_id'] = $student_id;
                $lessonStudents[$key]['created_at'] = date('Y-m-d H:i:s');
                $lessonStudents[$key]['updated_at'] = date('Y-m-d H:i:s');
            }
            
            LessonStudent::insert($lessonStudents);
        }

        return back()->with('success', 'Students assign to course please check in calender');
    }


    public function calendar($student_id){
        $student = Student::find($student_id);
        
        return view('admin.parents.calender', compact('student'));
    }


    public function getEvent(Request $request){
        
        $start_date = Carbon::parse($request->start)->format('Y-m-d');
        $end_date = Carbon::parse($request->end)->format('Y-m-d');

        $events = Lesson::with('batch')->whereDate('date', '>=', $start_date)
                        ->whereDate('date', '<=', $end_date)
                        ->get();
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