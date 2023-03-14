<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Mail;
use Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web')
            ->except(['login', 'postLogin', 'logout', 'verify', 'joinbeta', 'validateBetaUserEmail']);
        
    }

    public function login()
    {
        return view('users.login');
    }

    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ];

        $request->validate($rules);

        $user = User::where('email', $request->email)->first();
       
        if(!$user){
            session()->flash('error', 'We are unable to authenticate you. Please enter the correct email address.');
            return back()->withInput();
        }


        if(!$user->email_verified_at){
            session()->flash('error', 'Your account is not verified yet. Please check registered email and verify your account.');
            return back()->withInput();
        }

        if(!$user->is_active){
            session()->flash('error', 'Your account has been blocked. Please contact<a href="mailto:support@phonicsfun.com"> Support </a>');
            return back()->withInput();
        }
        
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            // Check payment on parent role

            return redirect()->intended('/dashboard')->with('success', 'You have logged in successfully!');
        }

        return back()->withInput($request->only('email', 'remember'))->with('error', 'Invalid email or password!');

    }


    public function logout(Request $request)
    {
        // $user = User::find(Auth::user()->id);
        // $user->is_otp_verified = 0;
        // $user->save(); 


        Auth::guard('web')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return  redirect('/')->with('success', 'You have been logged out successfully!');

    }

    public function changePassword()
    {

        return view('users.changed_password');
    }

    public function postChangePassword(Request $request)
    {        

         $request->validate([
            'password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ]);     
        
        $user = Auth::guard('web')->user();
        $old_password = $request->get('password');
        if(Hash::check($old_password, $user->password))
        {
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            session()->flash('success', 'Your password has been changed successfully.');         
            return redirect('change-password');                                                                    
        }
        else
        {
            return redirect('change-password')
                        ->withErrors(['password' => 'Old password is incorrect.'])
                        ->withInput();
            
        }       
    }    

  

    public function profile(){
        $user = Auth::guard('web')->user();
        $subscription = Subscription::with('plan')
                                    ->where('user_id', $user->id)
                                    ->whereDate('ends_at', '>=', Carbon::now()->format('Y-m-d H:i:s'))
                                    ->first();

        $user_count = 0;

        $user_count += User::where('parent_id', $user->id)->count(); 
        $user_count += Invite::where('parent_id', $user->id)->where('is_accepted', false)->count();

        $phone_codes = Country::pluck('phone_code', 'phone_code');
        $iso=Custom::getIso();

        if($user->disable_email){
            $user->email_analytics = 'disabled';
        }elseif($user->send_weekly_email){
            $user->email_analytics = 'weekly';
        }else{
            $user->email_analytics = 'monthly';
        }
        
        
        return view('users.profile', compact('user','subscription', 'user_count', 'phone_codes','iso'));
    }

    public function updateprofile(Request $request) {
        
        Validator::extend('is_valid_email', function($attribute, $value, $parameters)
        {
            if(strpos($value,'gmail.com')) {
               return false;
            }
            if(strpos($value,'yahoo.com')) {
                return false;
            }
            if(strpos($value,'hotmail.com')) {
                return false;
            }
            if(strpos($value,'outlook.com')) {
                return false;
            }
            return true;
        });
        $user = Auth::guard('web')->user();
        $old_is_two_way_authentication_on = $user->is_two_way_authentication_on;
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email'     => 'required|email|is_valid_email|unique:users,email,'.$user->id,
            'company' => 'required',
            'is_two_way_authentication_on' => 'required',
        ];

        $messages = [
            'email.unique' => 'The email address is already registered.',
            'email.email' => 'Please enter a valid email.',
            'email.is_valid_email' => 'Looks like you have entered a personal email. Please enter your work email.',
        ];

        if($request->phone){
            $rules['phone'] = 'required|integer';
            $rules['phone_code'] = 'required';
            $messages['phone.integer'] = 'Please enter a valid mobile number.';
        }

        if($request->otp){
            $rules['otp'] = 'required';
        }

        if($request->is_two_way_authentication_on == "1"){
            $rules['phone'] = 'required|integer';
            $rules['phone_code'] = 'required';
            $messages['phone.integer'] = 'Please enter a valid mobile number.';
        }

       
     
        $request->validate($rules, $messages);
        //varify opt
        if($request->otp){
            $user_otp = UserOtp::where('phone', $request->phone)->where('otp', $request->otp)->first();

            if(!$user_otp){
                return back()->withInput()->with('error', 'Invalid OTP.');
            }

            $user_otp->delete();
        }
       
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['company'] = $request->company;
        $data['phone'] = $request->phone;
        $data['phone_code'] = $request->phone_code;
        $data['is_two_way_authentication_on'] = $request->is_two_way_authentication_on;

        if($request->email_analytics == 'disabled'){
            $data['disable_email'] = 1;
            $data['send_weekly_email'] = 0;
            $data['send_monthly_email'] = 0;
        }elseif($request->email_analytics == 'weekly'){
            $data['disable_email'] = 0;
            $data['send_weekly_email'] = 1;
            $data['send_monthly_email'] = 0;
        }else{
            $data['disable_email'] = 0;
            $data['send_weekly_email'] = 0;
            $data['send_monthly_email'] = 1;
        }

        $user->update($data);
    
        if($request->email != $user->email){
            $user->new_email = $request->email;
            $user->save();
            Mail::to($user->new_email)->send(new VerifyUpdateEmail($user));
        }

        if($request->is_two_way_authentication_on == 1 && $request->is_two_way_authentication_on != $old_is_two_way_authentication_on)
        { 
            $user->is_otp_verified = 0;
            $user->is_two_way_authentication_on = $request->is_two_way_authentication_on;
            $user->save(); 
            Auth::guard('web')->logout();
            return  redirect('/')->with('success', 'Authentication status updated.Please login again');

        }



        return back()->with('success', 'Profile updated successfully');
    }
}