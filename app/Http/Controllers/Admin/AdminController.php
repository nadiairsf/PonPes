<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Hash;

class AdminController extends Controller
{
    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.home');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function changeAccount(Request $request)
    {
        $id = Auth::id();
        $user = Admin::where('id',$id)->get();

        return view('dashboard.admin.account',['user' => $user]);
    }

    public function changeAccountSave(Request $request)
    {
        $auth = Auth::id();

        $adminUpdate  = Admin::findOrFail($auth);
        $input = $request->all();
        $adminUpdate->fill($input)->save();

        return redirect()->back()->with('success', "Profil Changed Successfully");
    }

    public function changePassword(Request $request)
    {
        return view('dashboard.admin.change-password');
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
 
        $user =  Admin::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', "Password Changed Successfully");
    }
}
