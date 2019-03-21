<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use http\Cookie;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Task;
use App\Session;
use App\mobile;
use App\brand;
use App\user;
use Illuminate\Support\Facades\Input;


class mcontroller extends Controller
{
    //
    //
    
    public function nav_bar_brands(){

        $brands = DB::table('brands')->get();
        $mobiles = DB::table('mobiles')->get();
        return view ('masterPage', compact('brands'), compact('mobiles'));
    }
    public function show_mobiles(){
        $brands = DB::table('brands')->get();
        return view('home',compact('brands'));
    }

    public function view_item(Request $request){
        $item_id = Input::get('m_id');
        $mobile = DB::table('mobiles')->where('mobile_id','=',$_GET['m_id'])->get();
        $brands = DB::table('brands')->get();
        $comments  = DB::table('comments')->where('mobile_id','=',$item_id)->get();
        //$respose = new Response('Ahmed');
        //$respose->withCookie(\cookie('mobileID', $item_id));
        //$respose->withCookie(\cookie('mobile','asd'));
        //dd($request->cookie('mobileID'));
        //$respose->withCookie(cookie()->forever('user_id', $item_id));
        return view('view-item',compact('brands','item_id'),compact('mobile','comments'));
    }
    
    public function brand_view(Request $Request){
    	$br = $Request->selected_brand;
        $brands = DB::table('brands')->get();
        $mobiles = DB::table('mobiles')->where('brand_id','=',$br)->get();
        return view('view-brand', compact('brands'),compact('mobiles'));
    }

    public function brand_store(Request $Request){

        //$br = new brand();
        //$br->brand_name = $Request->title;
        //$br->brand_id = 125;
        //$br->save();
        $pa = new mobile();
        $pa->mobile_name = $Request->title;
        $pa->price = 1021;
        $pa->brand_id= 1152;
        $pa->rate = 22;
        $pa->img = $Request->title;
        $pa->save();
        return back();
    }

    public function add_mobile(){
    	$brands = DB::table('brands')->get();
    	
		
    	return view('admin.add_mobile',compact('brands'));
    }

    public function add_brand(){
    	$brands = DB::table('brands')->get();
    	
    	return view('admin.add_brand',compact('brands'));
    }

    public function save_mobile(Request $Request){
    	
    	$errors = array( );
    	if(Auth::check()){
			if(Auth::user()->group_id == 0){
				array_push($errors, "Not Allawed To you to add Mobile");
				//dd($errors);
				return back()->withErrors($errors);
			}
		}else{
			array_push($errors, "Login First");
			//dd($errors);
			//$brands = DB::table('brands')->get();
			//return view('admin.add_mobile',compact('errors'),compact('brands'));
			return back()->withErrors($errors);
		}
    	if(is_null($Request->mobile) ){
    		array_push($errors, "this Field Is Required");
    	}
    	if(is_null($Request->price)){
    		//$errors [] = "this Field Is Required";
    		array_push($errors, "this Field Is Required");
    	}
    	if(is_null($Request->brand)){
    		//$errors [] = "this Field Is Required";
    		array_push($errors, "this Field Is Required");
    	}
    	if(is_null($Request->rate)){
    		//$errors [] = "this Field Is Required";
    		array_push($errors, "this Field Is Required");
    	}
    	if(!empty($errors)){
    		//$brands = DB::table('brands')->get();
    		return back()->withErrors($errors);
    	}
    	$mobile = new mobile();
    	$mobile->mobile_name = $Request->mobile;
    	$mobile->price 		 = $Request->price;
    	$mobile->brand_id    = $Request->brand;
    	$mobile->rate 		 = $Request->rate;
    	$mobile->img 		 = $Request->mobile . $Request->img_type;
        $mobile->img2        = $Request->mobile . $Request->img_type;
    	$mobile->pices 		 = $Request->number;
        $mobile->disc        = $Request->disc;
    	$mobile->sale 		 = 0;
    	$mobile->save();

    	//$mobile->session()->flash('alert-success', ' Brand Added  successfully.');
    	return redirect('admin_panal') ;
    }

    public function save_brand(Request $Request){
    	
    	$errors = array( );
    	if(Auth::check()){
			if(Auth::user()->group_id == 0){
				array_push($errors, "Not Allawed To you to add Mobile");
				//dd($errors);
				return back()->withErrors($errors);
			}
		}else{
			array_push($errors, "Login First");
			//dd($errors);

			return back()->withErrors($errors);
		}
    	if(is_null($Request->brand_name) ){
    		array_push($errors, "this Field Is Required");
    	}
    	if(is_null($Request->brand_id)){
    		//$errors [] = "this Field Is Required";
    		array_push($errors, "this Field Is Required");
    	}
    	if(!empty($errors)){
    		//$brands = DB::table('brands')->get();
    		return back()->withErrors($errors);
    	}
    	$brand = new brand();
    	$brand->brand_name = $Request->brand_name;
    	$brand->brand_id   = $Request->brand_id;
    	$brand_com1 = DB::table('brands')->where('brand_id','=',$Request->brand_id)->get();
    	$brand_com2 = DB::table('brands')->where('brand_name','=',$Request->brand_name)->get();
    	if(!empty($brand_com1->brand_id) || !empty($brand_com2->brand_name)){
    		array_push($error , 'This Brand Is  Exist ');
    		return back()->withErrors($error);
    	}
    	$brand->save();
    	//$brand->session()->flash('alert-success', ' Brand Added  successfully.');
    	return redirect('admin_panal');
    }

    public function register(Request $request){

    	$brands = DB::table('brands')->get();
        return view('register',compact('brands'));

    }

    public function Register_save(Request $request){
    	$errors = array( );
    	if(is_null($request->name) ){
    		array_push($errors, "this Name Is Required");
    	}
    	if(is_null($request->email) ){
    		array_push($errors, "this E-mail Is Required");
    	}
    	if(is_null($request->pass1) ){
    		array_push($errors, "this Passord Is Required");
    	}
    	if(is_null($request->pass2) ){
    		array_push($errors, "this Confirm Password Is Required");
    	}
    	if($request->pass1 != $request->pass2 ){
    		array_push($errors, "Password not match");
    	}
    	if(!empty($errors)){
    		//$brands = DB::table('brands')->get();
    		return back()->withErrors($errors);
    	}
    	$old_user = DB::table('users')->where('email','=',$request->email)->get();
    	//dd(DB::table('users')->where('email','=',$request->email)->get());

    	//dd(user::where('email', '=', $request->email)->count());
    	if( user::where('email', '=', $request->email)->count() > 0 ){
    		array_push($errors, "This E-Mail is Alredy Registered ");
    		return back()->withErrors($errors);
    	}
		$user = new user();
		$user->name 	= $request->name;
		$user->email 	= $request->email;
		$user->password = Hash::make($request->pass1);
		$user->group_id = 0;
		$user->save();

		auth()->login($user);
		//dd($user);
		return redirect('/home');

    }

}
