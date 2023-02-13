<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use DB;
use Storage;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Category;
use Yajra\DataTables\DataTables;
class CoursesController extends Controller
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
        return view('admin.courses.index');
    }

    public function getCourses()
    {
        $courses = Course::with('category')->select('*');
        return Datatables::of($courses)
                ->editColumn('is_active', function($course){
                    return ($course->is_active) ? 'Active': 'Inactive';
                })
                ->editColumn('image', function($course){
                    return '<img class="img-thumbnail" src="'.Storage::url("courses/". $course->image) .'" width="50px;" height="50px;">';
                })
                 ->addColumn('action', function ($course) {
                     return '<div class="btn-group">
                                <a href="'. url("admin/courses/$course->id/edit").'" class="btn btn-primary" title="edit"><i class="cil-pencil"></i></a>
                        </div>';
                        // <a href="'. url("admin/courses/$course->id").'" class="btn btn-danger btn-delete-record" title="delete" data-id="'.$course->id.'"><i class="cil-trash"></i></a> 
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->pluck('name', 'id');
        return view('admin.courses.create', compact('categories'));
    }
    
    public function store(Request $request){
        
        $rules = [
            'name' => 'required|unique:courses,name',
            'description' => 'required',
            'category_id' => 'required',
            'age_group' => 'required',

            'classes_per_week' => 'required|integer',
            'total_classes' => 'required|integer',
            'sheets' => 'required',
            'reading_material' => 'required',
            'comprehensive_practice' => 'required',
            'sight_words' => 'required',
            'writing_activity' => 'required',
            'cost_per_class' => 'required',
            'duration' => 'required',
            // 'image' => 'required',
        ];

        $request->validate($rules);
        $data = $request->all();

        if($request->hasfile('image'))
        {
            $image = $request->image;
            $filename  = time().rand(0,9999999).'.'.$image->getClientOriginalExtension();  
            $filePath = 'courses' . DIRECTORY_SEPARATOR . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($image));

            $requestArr['image'] = $filename;
        }

        $course = Course::create($data);

        return redirect('admin/courses')->with('success', 'Course added successfully');
    }


    public function edit($id)
    {
        $course = Course::where('id', $id)->first();
        if(!$course){
            return redirect('admin/courses');
        }

        $categories = Category::where('is_active', true)->pluck('name', 'id');
        return view('admin.courses.edit', compact('categories', 'course'));
    }


    public function update($id, Request $request){
        $rules = [
            'name' => 'required|unique:courses,name,' . $id . ',id',
            'description' => 'required',
            'category_id' => 'required',
            'age_group' => 'required',

            'classes_per_week' => 'required|integer',
            'total_classes' => 'required|integer',
            'sheets' => 'required',
            'reading_material' => 'required',
            'comprehensive_practice' => 'required',
            'sight_words' => 'required',
            'writing_activity' => 'required',
            'cost_per_class' => 'required',
            'duration' => 'required',

            // 'phone' => 'required|unique:users,phone,' . $id . ',id',
        ];

        $request->validate($rules);

        $course = Course::where('id', $id)->first();
    
        $requestArr = $request->all();
        
        if($course){
            $oldImage = ($course)?$course->getRawOriginal('image'):'';
            
            $course->update($requestArr);  

            if($request->hasFile('image')){
           
                $image = $request->image;
                $filename  = time().rand(0,9999999).'.'.$image->getClientOriginalExtension();   
                $filePath = 'courses' . DIRECTORY_SEPARATOR . $filename;
                Storage::disk('public')->put($filePath, file_get_contents($image));

                $course->image = $filename;
                $course->save();  

                $oldImagePath = 'courses' . DIRECTORY_SEPARATOR . $oldImage;
                if(Storage::disk('public')->exists($oldImagePath)){
                    Storage::disk('public')->delete($oldImagePath);
                }                   
            }   
        }
        
        return redirect('admin/courses')->with('success', 'Course updated successfully!');
    }
    
    public function destroy($id) {
        $course = Course::where('id', $id)->first();
        
        if ($course) {
            //delete 
            $oldImagePath = 'courses' . DIRECTORY_SEPARATOR . $course->getRawOriginal('image');
            if(Storage::disk('public')->exists($oldImagePath)){
                Storage::disk('public')->delete($oldImagePath);
            } 
            $course->delete();

            return redirect('admin/courses')->with('success', 'Course deleted successfully!');
            
        } else {
            return redirect('admin/courses')->with('error', 'No data found!');
        }
    }

}