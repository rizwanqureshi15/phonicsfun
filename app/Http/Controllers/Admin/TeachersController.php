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
use Yajra\DataTables\DataTables;

class TeachersController extends Controller
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
        return view('admin.teachers.index');
    }

    public function getTeachers()
    {
        $teachers = User::select('*');
        return Datatables::of($teachers)
                ->editColumn('created_at', function($user){
					return $user->created_at->diffForHumans();
				})
                ->editColumn('image', function($teacher){
                    return '<img class="img-thumbnail" src="'.Storage::url("teachers/". $teacher->image) .'" width="50px;" height="50px;">';
                })
                 ->addColumn('action', function ($teacher) {
                     return '<div class="btn-group">
                                <a href="'. url("admin/teachers/$teacher->id/show").'" class="btn btn-primary" title="show"><i class="cil-description"></i></a>
                                <a href="'. url("admin/teachers/$teacher->id/edit").'" class="btn btn-primary" title="edit"><i class="cil-pencil"></i></a>
                        </div>';
                        // <a href="'. url("admin/teachers/$teacher->id").'" class="btn btn-danger btn-delete-record" title="delete" data-id="'.$teacher->id.'"><i class="cil-trash"></i></a> 
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
    }

    public function create()
    {
    	$genders = User::getAllGenders();
        return view('admin.teachers.create', compact('genders'));
    }
    
    public function store(Request $request){
        
        $rules = [
            'name' => 'required',
            'password' => 'required|min:6|max:16',
	        'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'qualification' => 'required',
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
            $filePath = 'teachers' . DIRECTORY_SEPARATOR . $filename;
            Storage::disk('public')->put($filePath, file_get_contents($image));

            $requestArr['image'] = $filename;
        }

        $teacher = User::create($data);

        $teacher->roles()->attach(1);

        return redirect('admin/teachers')->with('success', 'Teacher added successfully');
    }


    public function show($id)
    {
        $teacher = User::find($id);
        if(!$teacher){
            return redirect('admin/teachers');
        }

        $genders = User::getAllGenders();
        return view('admin.teachers.show', compact('genders', 'teacher'));
    }

    public function edit($id)
    {
        $teacher = User::find($id);
        if(!$teacher){
            return redirect('admin/teachers');
        }

        $genders = User::getAllGenders();
        return view('admin.teachers.edit', compact('genders', 'teacher'));
    }


    public function update($id, Request $request){
        $rules = [
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'qualification' => 'required',
        ];

        if($request->password){
        	$rules['password']  = 'required|min:6|max:16';	
        }
        

        $request->validate($rules);

        $teacher = User::find($id);
    
        $requestArr = $request->all();

        // if($request->password){
        // 	$requestArr['password']  = bcrypt($requestArr['password']);	
        // }
        
        
        if($teacher){
            $oldImage = ($teacher)?$teacher->getRawOriginal('image'):'';
            
            $teacher->update($requestArr);  

            if($request->hasFile('image')){
           
                $image = $request->image;
                $filename  = time().rand(0,9999999).'.'.$image->getClientOriginalExtension();   
                $filePath = 'teachers' . DIRECTORY_SEPARATOR . $filename;
                Storage::disk('public')->put($filePath, file_get_contents($image));
                
                $teacher->image = $filename;
                $teacher->save();  

                $oldImagePath = 'teachers' . DIRECTORY_SEPARATOR . $oldImage;
                if(Storage::disk('public')->exists($oldImagePath)){
                    Storage::disk('public')->delete($oldImagePath);
                }                   
            }   
        }
        
        return redirect('admin/teachers')->with('success', 'Teacher updated successfully!');
    }
    
    public function destroy($id) {
        $teacher = User::find($id);
        
        if ($teacher) {
            //delete 
            $oldImagePath = 'teachers' . DIRECTORY_SEPARATOR . $teacher->getRawOriginal('image');
            if(Storage::disk('public')->exists($oldImagePath)){
                Storage::disk('public')->delete($oldImagePath);
            } 
            $teacher->roles()->detach();
            $teacher->delete();

            return redirect('admin/teachers')->with('success', 'Teacher deleted successfully!');
            
        } else {
            return redirect('admin/teachers')->with('error', 'No data found!');
        }
    }

}