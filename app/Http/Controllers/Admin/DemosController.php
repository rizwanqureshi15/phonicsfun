<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use DB;
use Storage;
use Carbon\Carbon;
use App\Models\Demo;
use App\Models\Category;
use Yajra\DataTables\DataTables;
class DemosController extends Controller
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
        return view('admin.demos.index');
    }

    public function getDemos()
    {
        $demos = Demo::select('*');
        return Datatables::of($demos)
                ->addColumn('action', function ($demo) {
                     return '<div class="btn-group">
                                <a href="'. url("admin/demos/$demo->id/show").'" class="btn btn-primary" title="view"><i class="cil-description"></i></a>
                        </div>';
                        // <a href="'. url("admin/demos/$demo->id").'" class="btn btn-danger btn-delete-record" title="delete" data-id="'.$demo->id.'"><i class="cil-trash"></i></a> 
                })
                ->editColumn('course_id', function ($demo) {
                     return $demo->course->name;
                })

                
                ->rawColumns(['action'])
                ->make(true);
    }

    public function show($id) {
        $demo = Demo::where('id', $id)->first();
        
        if ($demo) {
            return view('admin.demos.show', compact('demo'));
        } else {
            return redirect('admin/demos')->with('error', 'No data found!');
        }
    }


    public function destroy($id) {
        $demo = Demo::where('id', $id)->first();
        
        if ($demo) {
           
            $demo->delete();

            return redirect('admin/demos')->with('success', 'Demo deleted successfully!');
            
        } else {
            return redirect('admin/demos')->with('error', 'No data found!');
        }
    }

}