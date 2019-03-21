<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
	$brands = DB::table('brands')->get();
    return view('welcome',compact('brands'));
    //return view('home',compact('brands'));
});
Route::get('ID/{id?}',function($id=1000001) {
   //echo 'ID: '.$id;
    $brands = DB::table('brands')->get();
   return  view('home', compact('brands','id'));
   //return view ('masterPage', compact('brands'), compact('mobiles'));
});
Route::get('test', 'mcontroller@nav_bar_brands');

Route::post('brand_store', 'mcontroller@brand_store');

Route::get('brand_view', 'mcontroller@brand_view');

Route::get('home','mcontroller@show_mobiles');

Route::get('view-item','mcontroller@view_item');

Route::get('add_mobile','mcontroller@add_mobile');

Route::post('add_mobile/save','mcontroller@save_mobile');

Route::get('add_brand','mcontroller@add_brand');

Route::post('add_brand/save','mcontroller@save_brand');

Route::get('register','mcontroller@register');
//Register/save

Route::post('Register/save','mcontroller@Register_save');

//log-in

Route::get('log-in','sessionController@log_in');

Route::post('log-in/save','sessionController@log_in_save');

Route::get('log-out','sessionController@log_out');

Route::get('admin_panal','authController@admin_panal');

Route::get('add_admin','authController@add_admin');

Route::post('add_admin/save','authController@add_admin_save');

Route::get('block_user','authController@block_user');
Route::get('block_admin','authController@block_user');

Route::get('block_user/save/{user}','authController@block_user_save');

Route::get('get_summery','authController@get_summery');

Route::get('add_love','authController@add_love');

Route::get('add_char','authController@add_char');

Route::get('view_profile','authController@view_profile');

Route::post('save_prfile/{user}','authController@save_prfile');
Route::post('add_comment/{user}','authController@add_comment');

//check out bill

Route::get('check_out/{user}','authController@check_out');

