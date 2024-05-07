<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wali;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Hash;

class WaliLogController extends Controller
{
    function create(Request $request){
        //Validate inputs
        $request->validate([
           'name'=>'required',
           'email'=>'required|email|unique:walis,email',
        ]);

        $doctor = new Wali();
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->email = $request->email;
        $doctor->password = \Hash::make($request->phone);
        $save = $doctor->save();

        if( $save ){
            return redirect()->back()->with('success','You are now registered successfully as Doctor');
        }else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
            'email'=>'required|email|exists:walis,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in wali wali table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('wali')->attempt($creds) ){
            return redirect()->route('wali.home');
        }else{
            return redirect()->route('wali.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('wali')->logout();
        return redirect('/');
    }

    public function showForgotForm(){
        return view('dashboard.wali.forgot');
        
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:walis,email'
        ]);

        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
        ]);
        $action_link = route('wali.reset.password.form',['token'=>$token,'email'=>$request->email]);
        $body = "Kami telah menerima permintaan untuk mengatur ulang kata sandi untuk akun SI-PON Anda yang terkait dengan ".$request->email." Anda dapat mengatur ulang kata sandi Anda dengan mengklik tautan di bawah ini.";

        \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
                $message->from('noreply@example.com', 'SI-PON');
                $message->to($request->email, 'Wali Name')
                        ->subject('Reset Password');
        });

        return back()->with('success', 'We have e-mailed your password reset link');
    }

    public function showResetForm(Request $request, $token = null){
        return view('dashboard.wali.reset')->with(['token'=>$token,'email'=>$request->email]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:walis,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            Wali::where('email', $request->email)->update([
                'password'=>\Hash::make($request->password)
            ]);

            // \DB::table('verify_doctors')->where([
            //     'email'=>$request->email
            // ])->delete();

            return redirect()->route('wali.login')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
    }
    
    public function changeAccount(Request $request)
    {
        $id = Auth::id();
        $user = Wali::where('id',$id)->get();

        return view('dashboard.wali.account',['user' => $user]);
    }

    public function changeAccountSave(Request $request)
    {
        $auth = Auth::id();

        $WaliUpdate  = Wali::findOrFail($auth);
        $input = $request->all();
        $WaliUpdate->fill($input)->save();

        return redirect()->back()->with('success', "Profil Changed Successfully");
    }

    public function changePassword(Request $request)
    {
        return view('dashboard.wali.change-password');
    }
 
    public function changePasswordSave(Request $request)
    {
        
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::user();
 
 // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) 
        {
            return back()->with('error', "Current Password is Invalid");
        }
 
// Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) 
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
 
        $user =  Wali::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', "Password Changed Successfully");
    }
}
