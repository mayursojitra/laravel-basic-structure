<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }

    //display login form
    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        //validate  admin credentials
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);


        //attemp login for admin
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }


        //redirect back with error on fail attempt

        toastr()->error('Oops! Invalid Email or Password!');
        return redirect()->back()->withInput($request->only('email','remember'))->withErrors('Invalid Username or password');
    }

    //logout admin
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
