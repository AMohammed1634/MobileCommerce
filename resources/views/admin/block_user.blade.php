@extends('admin.masterAdmin')

@section('content')

<div class="container">
	<div style="font-size: 90px; text-align: center;color:#000;text-shadow: 7px 7px 3px #000;">
		@if($users[0]->group_id == 0)
			Users Registerd
		@else
			Admins In Site
		@endif
	</div>
	<ul class="list-group list-group-flush">
		@if(Auth::user()->group_id == 1001 || ($select==0 && Auth::user()->group_id == 1))
					
				</li>

			@foreach($users as $user)
				@if($user->group_id == 0)
					
				@endif
				<li class="list-group-item btn " style="color: #000;font-family: sans-serif;">
					<div style="text-align: left; width: 25%;float: left;">
						{{$user->name}}
					</div>
					<div style="text-align: left; width: 35%;float: left;">
						 {{$user->email}}
					</div>
					<div style="text-align: right; width: 33%;float: left;">
						<a href="view_profile?user_id={{$user->id}}">
							<div class="btn btn-primary">
								View Profile
							</div>
						</a>
					</div>
					<div style="text-align: right; width: 7%;float: left;">
						<a href="block_user/save/{{$user->id}}">
							<div class="btn btn-primary">
								Block
							</div>
						</a>
					</div>
				</li>

			@endforeach
			@if ( $users[0]->group_id != 0 )
				<li class="list-group-item btn " style="color: #000;font-family: sans-serif;">
					<div style="text-align: left; width: 25%;float: left;">
						User Name : {{Auth::user()->name}}
					</div>
					<div style="text-align: left; width: 35%;float: left;">
						E-Mail : {{Auth::user()->email}}
					</div>
					<div style="text-align: right; width: 35%;float: left;">
						<a >
							<div class="btn btn-primary " disabled>
								YOU
							</div>
						</a>
					</div>
				</li>
			@endif

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