<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    function profile(){
       return view('admin.profile.index');
    }
    
    function ProfilePost (Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $old_name=Auth::user()->name;
        User::find(Auth::id())->update([
            'name'=> $request->name,
        ]);
     
        return back()->with('S_massage','Your name updated to ' .$old_name .' Successfully to '.$request->name);
    }

    function PasswordPost(Request $request){
        $request->validate([
            'old_password'=>'required',
            'password'=>'confirmed|required',
            'password_confirmation'=>'required'
        ]);
        if($request->old_password == $request->password){
            return back()->withErrors('Your new password can not be your old password');
        }
        $old_password_form_user = $request->old_password;
        $password_form_user_db = Auth::user()->password;
        if(Hash::check($old_password_form_user, $password_form_user_db)){
            User::find(Auth::id())->update([
                'password' => Hash::make($request->password)
            ]);
        }
        else{
            return back()->with('database_status','Your old password does not match ');
        }
            return back()->with('password_status','Your Password change Successfully!');
    }
}