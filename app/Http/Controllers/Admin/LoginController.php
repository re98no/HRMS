<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
class LoginController extends Controller
{
    public function show_login_view()  {
        return view('admin.auth.login'); 

    }
    // add Request Validation 
    public function login(LoginRequest $request)  {
        // visiting this route must be authenticated as admin 
        if(auth()->guard('admin')->attempt(['username'=>$request->input('username') ,'password'=>$request->input('password')])){
            //  get admin main pagee
            return redirect()->route('admin.dashboard');
            // view('layouts.admin');
        }else{
            // wiht will act in side the session to call it first check if the session has an error by Session::has('error') then print it Session::get('error');
            return redirect()->route('admin.showlogin')->with(['error'=>" Data incorect"]);
        }
    }


    
}
