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
	<div style="font-size: 90px; text-align: center;color:#000;text-shadow: 7px 7px 3px #000;">Log IN</div>
	<div class="mi-form-style" style="color:#000">
		<form action="log-in/save" method="post" class="form-group admin-form" style="color: #000;padding: 10px;"><br>
			{{ csrf_field() }}
			<!--<lable>UserName</lable><input name="name" class="form-control" type="text"><br>-->
			<lable>E-Mail</lable><input name="email" class="form-control" type="email"><br>
			<lable>Your Password</lable><input name="password" class="form-control" type="password"><br>
			
			<div style="">
				
			</div>
			<br>
			
			<button type="submit" class="btn btn-primary mb-2"> LOG IN </button>
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



@stop