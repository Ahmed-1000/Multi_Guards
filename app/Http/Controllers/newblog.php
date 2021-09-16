<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use  Illuminate\Support\Facades\Auth;

class newblog extends Controller
{
    function create(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
            
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();
        
        if($save){
            return redirect()->back()->with('success','you are new registered successfully');
        }else{
            return redirect()->back()->with('fail','something is wrong in register try again please !');
        }
    }
    function check(Request $request){
        
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
            
        ],[
           
            'email.exists' => 'this is email do not exists on user table'
            
        ]);
        
        $creds = $request->only('email','password');
        
        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.Home');
        }else{
            
             return redirect()->route('user.login')->with('fail','wrong user logged');
        }
        
    }
    function logout(){
        
        Auth::guard('web')->logout();
        
        return redirect('/');
    }
}
