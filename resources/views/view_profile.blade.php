<style type="text/css">
	*{
		box-sizing: border-box;
	}
	.mi-chart{
		width:29%;
		background-color:#DDD;
		float: left;
		margin:2%;
		height:60%;
		border-radius: 3px
	}
</style>

@extends('master_profile')

@section('content')


<div class="container">
	 @if(!Auth::check())

	 	<a href="/log-in" style="width: 45%;margin-left: 28%;">
        	<div type="button" class="btn btn-outline-danger" style="width: 470px;height: 100px;font-family: sans-serif;font-size: 30px;margin:20px;padding: 30px">
        	
        	You Should Log in Or Register
        	</div>
        </a>

	  @else
		<div style="font-size: 90px; text-align: center;color:#000;text-shadow: 7px 7px 3px #000;">
			
			@foreach($user as $one)
				{{$one->name}}
			@endforeach
		</div>
		
		<div style="clear: both;"></div>
		<div style="background-color: #DDD;height: 50px;">
			@if(Auth::check())

					<a href="#" class="btn btn-outline-primary" style="vertical-align: auto;margin: 0.65% 15px; float:right;">
						view Bill
					</a>

				
				<a href="check_out/{{Auth::user()->id}}" class="btn btn-outline-primary" style="vertical-align: auto;margin: 0.65% 15px; float:right;">
					Check Out
				</a>
	    	@else

			@endif
		</div>

   


   

	    @foreach($chart as $item)
	    	<?php 

	    		$mobile = DB::table('mobiles')->where('mobile_id','=',$item->mobile_id)->get();
	    	?>
	    	@foreach($mobile as $mobo)
		    <div class="card mb-3" style="max-width: 540px;height: 300px;font-family: sans-serif;">
				  <div class="row no-gutters" style="height: 95%; width: 100%">
					    <div class="col-md-4" style="height: 100%">
					      <img src="images/{{$mobo->img}}" class="card-img" alt="..." style="height: 100%">
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h4 class="card-title"  style="text-align: center;">{{$mobo->mobile_name}}</h4>
					        <h5 class="card-title" style="text-align: center;">{{$mobo->price}} $</h5>
					        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					        <p class="card-text" style="text-align: center;">
					        	ADDED TO CHART 
					        </p>
					        <div  >
		                        <div class="col-xs-12 last-info" style="margin-top:10%;text-align: center;">
		                            <span class="mobile-rate">
		                                <span class="rate"> 
		                                    <i class="fa fa-eye">
		                                        
		                                    </i> Rate : </span>
		                                    @for($i=0 ; $i<$mobo->rate ; $i++)
		                                        <i class="fa fa-star" style="color:#FF9800"></i>
		                                    @endfor
		                                    @for($i=$mobo->rate ; $i<5 ; $i++)
		                                        <i class="fa fa-star" style="color:#DDD;"></i>
		                                    @endfor
		                                    
		                            </span><span class="mobile-barnd">
		                                        <span class="mobile-cat"> <br>
		                                    <i class="fa fa-tag"></i> Category : </span>

		                                    <span>
		                                    	@foreach($brands as $brand)
		                                    		@if($brand->brand_id == $mobo->brand_id)
		                                    			{{$brand->brand_name}}
		                                    		@endif
		                                    	@endforeach
		                                    </span>
		                                    </span>
		                        </div>
		                    </div>

					        
					      </div>
					    </div>
				  </div>
			</div>
			@endforeach
	    @endforeach



	    @foreach($love as $item)
	    	<?php 

	    		$mobile = DB::table('mobiles')->where('mobile_id','=',$item->mobile_id)->get();
	    	?>
	    	@foreach($mobile as $mobo)
		    <div class="card mb-3" style="max-width: 540px;height: 300px;font-family: sans-serif;">
				  <div class="row no-gutters" style="height: 95%; width: 100%">
					    <div class="col-md-4" style="height: 100%">
					      <img src="images/{{$mobo->img}}" class="card-img" alt="..." style="height: 100%">
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h4 class="card-title"  style="text-align: center;">{{$mobo->mobile_name}}</h4>
					        <h5 class="card-title" style="text-align: center;">{{$mobo->price}} $</h5>
					        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					        <p class="card-text" style="text-align: center;">
					        	LOVED
					        </p>
					        <div  >
		                        <div class="col-xs-12 last-info" style="margin-top:10%;text-align: center;">
		                            <span class="mobile-rate">
		                                <span class="rate"> 
		                                    <i class="fa fa-eye">
		                                        
		                                    </i> Rate : </span>
		                                    @for($i=0 ; $i<$mobo->rate ; $i++)
		                                        <i class="fa fa-star" style="color:#FF9800"></i>
		                                    @endfor
		                                    @for($i=$mobo->rate ; $i<5 ; $i++)
		                                        <i class="fa fa-star" style="color:#DDD;"></i>
		                                    @endfor
		                                    
		                            </span><span class="mobile-barnd">
		                                        <span class="mobile-cat"> <br>
		                                    <i class="fa fa-tag"></i> Category : </span>

		                                    <span>
		                                    	@foreach($brands as $brand)
		                                    		@if($brand->brand_id == $mobo->brand_id)
		                                    			{{$brand->brand_name}}
		                                    		@endif
		                                    	@endforeach
		                                    </span>
		                                    </span>
		                        </div>
		                    </div>

					        
					      </div>
					    </div>
				  </div>
			</div>
			@endforeach
	    @endforeach

    @endif
</div>

@stop