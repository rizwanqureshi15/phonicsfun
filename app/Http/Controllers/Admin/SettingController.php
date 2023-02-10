<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Carbon\Carbon;
use Validator;
use File;
use Storage;

class SettingController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:admin');
    }
    
    public function index(){

        $data = array();
        $names = ['MAIL_DRIVER', 'MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_ENCRYPTION'];

        $data['rows'] = Setting::whereIn('name', $names)->get();

        return view('admin.setting',$data);

    }

    public function update(Request $request)
    {
        $params = $request->setting;

        $rules = [
            'MAIL_DRIVER' => 'required',            
            'MAIL_HOST' => 'required',  
            'MAIL_PORT' => 'required',            
            'MAIL_USERNAME' => 'required',  
            'MAIL_PASSWORD' => 'required',            
            'MAIL_ENCRYPTION' => 'required',
        ];

        $message = [
            'MAIL_DRIVER.required' => 'This field is required.',
            'MAIL_HOST.required' => 'This field is required.',
            'MAIL_PORT.required' => 'This field is required.',
            'MAIL_USERNAME.required' => 'This field is required.',
            'MAIL_PASSWORD.required' => 'This field is required.',
            'MAIL_ENCRYPTION.required' => 'This field is required.',
        ];

        $validator = Validator::make($params,$rules, $message);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();

        }

        foreach($params as $name => $value)
        {
            $obj = Setting::where('name', $name)->first();

            if($obj)
            {
                $obj->value = $value;
                $obj->save();   
            }

            unset($obj);
        }

        
        return redirect('admin/settings')->with('success', 'Setting has been changed successfully!');
    }
}
