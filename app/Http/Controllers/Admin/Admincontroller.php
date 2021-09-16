<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Admin;
use  Illuminate\Support\Facades\Auth;

class Admincontroller extends Controller
{
    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
            
        ],[
            
            
            'email.exists'=>'this is email is noy exists in admin table'
        ]);
        
        $creds = $request->only('email','password');
        
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.Home');
        }else{
            
             return redirect()->route('admin.login')->with('fail','wrong admin logged');
        }
    }
    function logout(){
        
        Auth::guard('admin')->logout();
        
        return redirect('/');
    }
    function search(){
        $search_text = $_GET['query'];
        
        
        $student = User::where('name','LIKE','%'.$search_text.'%')->get();
        
        return view('dashboard.admin.search',compact('student'));
    }
    function edit($id){
        $student = User::find($id);
        
        return view('dashboard.admin.edit',compact('student'));
    }
    function update(Request $request, $id){
        $student = User::find($id);
         $student->email = $request->input('email');
         $student->name = $request->input('name');
          $student->update();
        return redirect('admin/Home')->with('status','Data update successfully');
        
    }
    function delete($id){
          $student = User::find($id)->delete();
        
        return back()->with('success','account deleted');
        
    }
}
