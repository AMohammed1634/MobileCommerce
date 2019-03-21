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
                                array('add_mobile','Add Mobile'),
                                array('add_brand','Add Brand')
                                  );
        ?>
        <div class="container" style="padding: 15px;text-align: center;">
            @foreach($admin_option as $option)
                <a href="{{$option[0]}}" style="margin: 7px;"><div type="button" class="btn btn-primary">{{$option[1]}}</div></a>

            @endforeach
            <!--<a href="#"><div type="button" class="btn btn-primary">Primary</div></a>
            <a href="#"><div type="button" class="btn btn-primary">Primary</div></a>
           <a href="#"><div type="button" class="btn btn-primary">Primary</div></a>-->
        </div>
<div class="container">
	<div style="font-size: 90px; text-align: center;color:#000;text-shadow: 7px 7px 3px #000;">Add Mobile</div>
	<div class="mi-form-style" style="color:#000">
		<form action="add_mobile/save" method="post" class="form-group admin-form" style="color: #000;padding: 10px;"><br>
			{{ csrf_field() }}
			<lable>mobile name</lable><input name="mobile" class="form-control" type="text">
			<div style="">
				
			</div>
			<br>
			<lable>mobile price</lable><input name="price" class="form-control" type="text"><br>
			<lable>mobile rate from [ 1 : 5 ]</lable><input name="rate" class="form-control" type="text"><br>
			<lable>Number Of element : </lable><input name="number" class="form-control" type="text"><br>
			
			<label for="inputState">Brand Type</label>
		    <select id="inputState" class="form-control" name="brand">
		    	<option selected>...</option>
		    	@foreach($brands as $brand)
		        	<option  value="{{$brand->brand_id}}" >{{$brand->brand_name}}</option>
		        @endforeach
	        
		    </select>
		    <lable>mobile discription</lable><textarea name="disc" class="form-control" type="text"></textarea><br>
		    <label >Type Of Image</label>
		    <div class="form-check">
			  <input class="form-check-input" type="radio" name="img_type" id="exampleRadios1" value=".JPG" checked>
			  <label class="form-check-label" for="exampleRadios1">
			    .JPG
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="img_type" id="exampleRadios2" value=".PNG">
			  <label class="form-check-label" for="exampleRadios2">
			    .PNG
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="img_type" id="exampleRadios3" value=".GIF" >
			  <label class="form-check-label" for="exampleRadios3">
			    .GIF
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="img_type" id="exampleRadios4" value=".JPEG" >
			  <label class="form-check-label" for="exampleRadios4">
			    .JPEG
			  </label>
			</div><br><br>
			<button type="submit" class="btn btn-primary mb-2">ADD THIS MOBILE</button>
		</form>
		<div class="container" style="text-align: center;background-color: rgba(231,68,48,0.5);color: #870000;border-radius: 5px;">
			<ul>
				@foreach($errors->all() as $error)
				<li style="" >{{$error}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

<!--
<form method="post" class="form-group admin-form">
        <lable>mobile name</lable><input name="mobile" class="form-control" type="text"><lable>mobile price</lable><input name="price" class="form-control" type="text"><lable>mobile rate from [ 1 : 5 ]</lable><input name="rate" class="form-control" type="text"><br>
<b>Fatal error</b>:  Call to a member function prepare() on null in <b>C:\xampp\htdocs\mcommerce\includes\functions\functions.php</b> on line <b>19</b><br>
</form>-->
@stop

