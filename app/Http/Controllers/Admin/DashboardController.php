<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use DB;
use Carbon\Carbon;
use App\User;

class DashboardController extends Controller
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
        return view('admin.dashboard');
    }

    public function changePassword()
    {
        return view('admin.change_password');
    }


    // post change password
    public function postChangePassword(Request $request)
    {        

        $request->validate([
            'password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ]);     
        
        $user = Auth::user();
        $old_password = $request->get('password');
        if(Hash::check($old_password, $user->password))
        {
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            session()->flash('success', 'Your password has been changed successfully.');         
            return redirect('admin/change-password');                                                                    
        }
        else
        {
            return redirect('admin/change-password')
                        ->withErrors(['password' => 'Old password is incorrect.'])
                        ->withInput();
            
        }       
    }      
}
