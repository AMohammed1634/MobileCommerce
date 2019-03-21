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
<div class="container">
	@foreach($errors as $error)
	{{$error}}
	@endforeach
	<div style="font-size: 90px; text-align: center;color:#000;text-shadow: 7px 7px 3px #000;">Log-in</div>
	<div class="mi-form-style" style="color:#000">
		<form action="add_brand/save" method="post" class="form-group admin-form" style="color: #000;padding: 10px;"><br>
			{{ csrf_field() }}
			<lable>UserName</lable><input name="brand_name" class="form-control" type="text">
			<div style="">
				
			</div>
			<br>
			<lable>Password</lable><input name="brand_id" class="form-control" type="Password"><br>
			<button type="submit" class="btn btn-primary mb-2">Log-IN</button>
		</form>
	</div>
</div>



@stop