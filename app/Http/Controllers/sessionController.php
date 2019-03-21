<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Task;
use App\Session;
use App\mobile;
use App\brand;
use App\user;

class sessionController extends Controller
{
    //
    public function log_in(){
    	$brands = DB::table('brands')->get();
    	return view('Admin.log_in',compact('brands'));
    }

    public function log_out(){
    	auth()->logout();
    	//$brands = DB::table('brands')->get();
    	return redirect('home');
    }
    public function log_in_save(Request $request ){
    	$check = $request->only('email','password');
    	//$user =DB::
    	$this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //dd(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]));
    	$errors = array( );
        if(!Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
        	array_push($errors, "E-Mail Or Password Wrong");
            return back()->withErrors($errors);
        }

        return redirect('home');
    	/*
    	if(! Auth()->attempt(request(['email','password']))){
    		
    		return back()->withErrors([
    			'message'	=>'Not Allawed'
    		]);
    	}
    	else{
    		return redirect('home');
    	}*/
    }
}
