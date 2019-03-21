@extends('admin.masterAdmin')
@section('content')

<div class="container">
	<div style="font-size: 90px; text-align: center;color:#000;text-shadow: 7px 7px 3px #000;">
		Summery
	</div>
	<ul class="list-group list-group-flush">
		@if(Auth::user()->group_id == 1001)
			<div class="select-box" style="background-color: #DDD;border-radius: 3px;">
				<label for="inputState" style="margin-left: 15px;font-family: sans-serif;margin-right: 20px;">Brand Type</label>
				<select id="inputState" class="form-control" name="brand" style="width: 15%;text-align: right; display: inline-block;margin: 8px;">
			    	<option selected>...</option>
			    	@foreach($brands as $brand)
			        	<option  value="{{$brand->brand_id}}" >{{$brand->brand_name}}</option>
			        @endforeach
		        
			    </select>
			    <label for="" style="margin-left: 15px;font-family: sans-serif;margin-right: 20px;">Sorted By</label>
				<select id="inputState" class="form-control" name="sort" style="width: 15%;text-align: right; display: inline-block;margin: 8px;">
			    		<option selected>...</option>
			    	
			        	<option  value="0" >Price</option>
			        	<option  value="1" >Soled</option>
			       
		        
			    </select>
			</div>
			<li class="list-group-item btn " style="color: #000;font-family: sans-serif;">
					<div style="text-align: center; width: 30%;float: left;">
						Mobile Name :
					</div>
					<div style="text-align: left; width: 15%;float: left;">
						Price : 
					</div>
					<div style="text-align: left; width: 20%;float: left;">
						Number of Items :
					</div>
					<div style="text-align: left; width: 10%;float: left;">
						Soled : 
					</div>
			@if(isset($_GET['sort']))
				@if($_GET['sort'] == 0)
					$mobile = DB::table('mobiles')->orderBy('price')->get();
				@endif
			@endif
			@foreach($mobiles as $mobile)
				
				<li class="list-group-item btn " style="color: #000;font-family: sans-serif;">
					<div style="text-align: left; width: 30%;float: left;">
						{{$mobile->mobile_name}}
					</div>
					<div style="text-align: left; width: 15%;float: left;">
						{{$mobile->price}} $$
					</div>
					<div style="text-align: left; width: 20%;float: left;">
						 {{$mobile->pices}}
					</div>
					<div style="text-align: left; width: 10%;float: left;">
						 {{$mobile->sale}}
					</div>
					<div style="text-align: right; width: 10%;float: left;">
						<a href="view-item?m_id={{$mobile->mobile_id}}">
							<div class="btn btn-primary">
								View Item
							</div>
						</a>
					</div>
					<div style="text-align: right; width: 13%;float: left;">
						<a href="#">
							<div class="btn btn-outline-danger">
								DELETE ITEM
							</div>
						</a>
					</div>
				</li>

			@endforeach
			

		@else
		<div class="container" style="text-align: center;font-family: sans-serif; background-color: rgba(231,68,48,0.5);color: #870000;border-radius: 5px;">
			<ul>
				@if(Auth::check())
					<li style="" >You Can Not See This Data </li>
				@else
					<li style="" >Please Log in First </li>
				@endif
				
			</ul>
		</div>
		@endif
	</ul>
</div>


@stop