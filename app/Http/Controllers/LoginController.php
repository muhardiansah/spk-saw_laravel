<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
    	return view('login.login');
    }

    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('username','password'))) {
    		return redirect ('/dashboard');
    	}else{ 
    	return redirect('/login');
        }

    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
