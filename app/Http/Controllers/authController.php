<?php

namespace App\Http\Controllers;
use App\bill;
use App\comment;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\user;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Task;
use App\Session;
use App\mobile;
use App\brand;
use App\transaction;


class authController extends Controller
{
    //
    protected function validator(array $data)
	{
	    return Validator::make($data, [
	        
	        'email' => 'required|email|max:255|unique:users',
	        'password' => 'required|min:6|confirmed',
	        'username' => 'required|alpha_num|unique:users,username',
	    ]);
	}
	public function admin_panal(){
		 $brands = DB::table('brands')->get();
		return view('admin.admin_panal',compact('brands'));
	}

	public function add_admin(){
		 $brands = DB::table('brands')->get();
		return view('admin.add_admin',compact('brands'));
	}

	public function add_admin_save(Request $request){

		$errors = array( );
		if(Auth::check()){
			if(Auth::user()->group_id == 0){
				array_push($errors, "Not Allawed To you to add Admin");
				return back()->withErrors($errors);
			}
		}else{
			array_push($errors, "Login First");
			return back()->withErrors($errors);
		}
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
		$user->group_id = 1;
		$user->save();

		auth()->login($user);
		//dd($user);
		return redirect('admin_panal');
	}


	public function block_user(){
		$select = Input::get('q');
	 	$brands = DB::table('brands')->get();
	 	$users	= DB::table('users')->where('group_id','=',$select)->get();
		return view('admin.block_user',compact('brands'),compact('users','select'));
	}

	public function block_user_save(user $user){
		$user->delete();
		return back();
	}

	public function get_summery(){
		$brands 	= DB::table('brands')->get();
		$mobiles	= DB::table('mobiles')->get();
		return view ('admin.get_summery',compact('brands'),compact('mobiles'));
	}

	public function add_love(transaction $trans){
		$user_id		   = Input::get('user_id');
		$mobile_id 		   = Input::get('moblie_id');
		//$last = DB::table('transactions')->where('user_id','=',$user_id)->get();
		$last = DB::select('SELECT * FROM `transactions` WHERE user_id=? && mobile_id = ? && trans_type = ? ',[$user_id,$mobile_id , 0]);
		$errors=array();
		if(count($last)!=0){
			//dd($user_id."   ".$mobile_id." Loved  ");
			array_push($errors, "Loved");
			return back()->withErrors($errors);
		}
		$trans->user_id	   = $user_id;
		$trans->mobile_id  = $mobile_id;
		$trans->trans_type = 0;//0 for love product ;
		$trans->trans_buy  = 0;//0for not buy element;''
		$trans->save();
		//dd($user_id."   ".$mobile_id);
		return back();
	}

	public function add_char(transaction $trans){
		$user_id		   = Input::get('user_id');
		$mobile_id 		   = Input::get('moblie_id');
		$last = DB::select('SELECT * FROM `transactions` WHERE user_id=? && mobile_id = ? && trans_type = ? ',[$user_id,$mobile_id , 1]);
		$errors=array();
		if(count($last)!=0){
			//dd($user_id."   ".$mobile_id." Loved  ");
			array_push($errors, "Loved");
			return back()->withErrors($errors);
		}
		$trans->user_id	   = $user_id;
		$trans->mobile_id  = $mobile_id;
		$trans->trans_type = 1;//1 for chart  product ;
		$trans->trans_buy  = 0;//0 for not buy element;''
		$trans->save();
		//dd($user_id."   ".$mobile_id);
		return back();
	}

	public function view_profile(){
		$user_id    = Input::get('user_id'); 
		$user   	= DB::table('users')->where('id','=',$user_id)->get();
		$trans 		= DB::table('transactions')->where('user_id','=',$user_id);
		$brands 	= DB::table('brands')->get();
		$chart 		= DB::select('SELECT * FROM `transactions` WHERE user_id=? && trans_type = ? '   ,[$user_id , 1]);
		$love 	 	= DB::select('SELECT * FROM `transactions` WHERE user_id=? && trans_type = ? ',[$user_id , 0]);
        foreach($user as $one ) {
            $img_url = $one->img;
        }
		return view ('view_profile',compact('brands','user'),compact('chart','love','user_id','img_url'));
	}
	public function save_prfile(Request $request,user $user){
        //dd($user->id);
        $selected = new user();
        $selected = DB::table('users')->where('id','=',$user->id)->get();
        $selected->img = $request->img;

        if(is_null($request->img)){

            return back();
        }
        $user->img      = $request->img;
        $user->update();
        return back();
    }
    public function add_comment(Request $request , user $user ){
        $mobile_id = Input::get('mobile_id');
        //dd($user->id . "   ",$mobile_id);
        $comment = new comment();
        $comment->comment    = $request->comment;
        $comment->user_id    = $user->id;
        $comment->mobile_id  = $mobile_id;
        $comment->save();

        return back();
    }

    public function check_out(user $user){
        $chart 		= DB::select('SELECT * FROM `transactions` WHERE user_id=? && trans_type = ? '   ,[$user->id , 1]);
        foreach($chart as $item){
            $bill = new bill();
            $bill->user_id      = $user->id;
            $bill->mobile_id    = $item->mobile_id;
            $bill->no_items     = 1;
            //$trans = transaction::all();
            $price = DB::table('mobiles')->where('mobile_id','=',$item->mobile_id)->first();
            $bill->price        = $price->price;
            $bill->save();


        }
        $test = transaction::all();
        $test = DB::select('SELECT * FROM `transactions` WHERE user_id=? && trans_type = ? '   ,[$user->id , 1]);
        foreach ($test as $item){
            DB::delete('delete from transactions where user_id = ? && trans_type = ?',[$user->id,1]);
        }
        $errors = array();
        return back()->withErrors('errors');
    }
}
