<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$user = User::all();
    	return view('admin.user.index', compact('user')); 
    }

    public function create()
    {
    	# code...
    }

    public function edit($id)
    {
    	$user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // $this->validate($request,[
        //         'name' => '',
        //         'username' => 'required|unique:users,username,',
        //         'password' => 'min:6'
        // ]);
        // $user = User::update($request->all());

        // return redirect()->route('admin.user.index');

        $requestData = $request->all();
        if ($request->pass_baru!=null) {
        	# code...
	    	if ($request->pass_baru==$request->pass_confirm) {
	    		
	        $requestData['password']=bcrypt($request->pass_baru);
	    	}else{
	        return redirect()->route('admin.user.edit',$id); 
	    	}
        }
        $user = User::findOrFail($id);

        $user->update($requestData);

        return redirect()->route('admin.user.index');
    }
}
