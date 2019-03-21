@extends('Admin.masterAdmin')

@section('content')
<style type="text/css">
	.mi-form-style{
		width: 60%;
		margin: auto;
		padding: 15px;
		color:#000;
		border:0.5px solid #DDD;
		border-top: 4px solid #007BFF;
		font-family: sans-serif;
		box-shadow: 7px 7px 7px #DDD;
		box-shadow:-7px -7px -7px #DDD;
	}
</style>
        <?php 
            $admin_option = array(
                                array('add_mobile','Add Mobile','mobile',-1),
                                array('add_brand','Add Brand','building ',-1),
                                array('add_admin','Add Admin','unlock-alt',-1),
                                array('block_admin','block Admin','ban ',1),
                                array('register','Add User','unlock-alt  ',-1),
                                array('block_user','block User','ban ',0),
                                array('get_summery','Get Summery','exclamation-triangle ',-1),
                                array('track_user','Track User','ban ',1),
                                  );
        ?>
        <div class="container" style="padding: 15px;text-align: center;">
        	@if(Auth::check()&&(Auth::user()->group_id == 1 ||Auth::user()->group_id == 1001))
	            @foreach($admin_option as $option)
	            	@if(Auth::user()->group_id == 1 && ($option[0]=='add_admin' || $option[0]=='block_admin' || $option[0]=='get_summery'))
	            		@continue 
	            	@endif
	                <a href="{{$option[0]}}?q={{$option[3]}}" style="margin: 2.5%;width: 45%;">
	                	<div type="button" class="btn btn-primary" style="width: 470px;height: 100px;font-family: sans-serif;font-size: 30px;margin:20px;">
	                	<i class="fa fa-{{$option[2]}}" style="margin-right: 15px;font-size: 60px;" ></i>
	                	{{$option[1]}}
	                	</div>
	                </a>

	            @endforeach

            @else
            	<a href="/log-in" style="margin: 2.5%;width: 45%;">
	                	<div type="button" class="btn btn-outline-danger" style="width: 470px;height: 100px;font-family: sans-serif;font-size: 30px;margin:20px;padding: 30px">
	                	
	                	You Should Log in Or Register
	                	</div>
	                </a>
            @endif
            <!--<a href="#"><div type="button" class="btn btn-primary">Primary</div></a>
            <a href="#"><div type="button" class="btn btn-primary">Primary</div></a>
           <a href="#"><div type="button" class="btn btn-primary">Primary</div></a>-->
        </div>




@stop