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

    public function getparents()
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
        return view('admin.parents.show', compact('genders', 'parent'));
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
            $parent->roles()->detach();
            $parent->delete();

            return redirect('admin/parents')->with('success', 'parent deleted successfully!');
            
        } else {
            return redirect('admin/parents')->with('error', 'No data found!');
        }
    }

}