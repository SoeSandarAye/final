@extends('layouts.app')

@section('content')

<div class="card offset-md-3 col-md-6 shadow" style="background-color: #fff">
	<div class="card-header" style="background-color: #fff">
		<div class="row" style="background-color: #fff">
			<div class="col-md-4">
				<img src="{{asset('logo/social.png')}}" style="width: 50px;height: 50px;margin-left: 140px">
			</div>
			<div class="col-md-8 py-2">
				<h3 style="color: #4d636f;"><i><b>Create your account</b></i></h3>
			</div>
		</div>
	</div>

	<div class="card-body">
		<div class="form-group">
			
			<form action="{{route('userregister.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6">
					<div class="form-group">
					<label for="name"><b>Name:</b></label>
					<input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
					@if ($errors->has('name'))
						<span class="invalid-feedback">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<label for="name"><b>Email:</b></label>
					<input type="email" name="email" id="name" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
					@if ($errors->has('email'))
						<span class="invalid-feedback">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
					</div>
				</div>
				</div>
				
			

				

				<div class="form-group">
					<label for="phone"><b>Phone:</b></label>
					<input type="text" name="phone" id="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}">
					@if ($errors->has('phone'))
						<span class="invalid-feedback">
						<strong>{{ $errors->first('phone') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<label for="dob"><b>DOB:</b></label>
					<input type="date" name="dob" id="dob" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}">
					@if ($errors->has('dob'))
						<span class="invalid-feedback">
						<strong>{{ $errors->first('dob') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<label for="gender"><b>Gender:</b></label><br>
					
					<div class="form-check d-inline">
						<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="1" checked>
						<label class="form-check-label" for="gridRadios1">
							Male
						</label>
					</div>
					<div class="form-check d-inline">
						<input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="0">
						<label class="form-check-label" for="gridRadios2">
							Female
						</label>
					</div>
				</div>

				

				<div class="form-group">
					<label for="address"><b>Address:</b></label>
					<textarea rows="3" id="address" name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"></textarea>
					@if ($errors->has('address'))
						<span class="invalid-feedback">
						<strong>{{ $errors->first('address') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					<label for="photo"><b>Photo:</b></label><br>
					<input type="file" name="photo" id="photo">
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					<label for="password"><b>Password:</b></label>
					<input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}">
					@if ($errors->has('password'))
						<span class="invalid-feedback">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					<label for="cpassword"><b>Confirm Password:</b></label>
					<input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
					@if ($errors->has('password_confirmation'))
						<span class="invalid-feedback">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>
					@endif
				</div>
					</div>
					 
				</div>
				

				

				<div class="form-group pt-3">
					<button class="btn btn-primary btn-block" type="submit">Register</button>
					
				</div>
				<div class="text-center">
					<a href="{{ route('user.store') }}" class="btn btn-link">Already have an account?</a>
				</div>
	</form>
</div>
	</div>
</div>


@endsection