<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

class apicontroller extends Controller
{
    public function login(Request $request){
        
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30'
            
        ],[
           
            'email.exists' => 'this is email do not exists on user table'
            
        ]);
        
        $creds = $request->only('email','password');
        
        if(!Auth::attempt($creds)){
            return response(['message' => 'invalid login ']);
        }else{
            $accesstoken = Auth::user()->createToken('authToken')->accessToken;
            
            return response(['user' => Auth::user(), 'access_token' => $accesstoken]);
        }
    }
}
    
