@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Change Password</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('change-password')}}">
			@csrf
			<div class="form-group row">
				<label class="col-md-2 col-form-label" for="password">Old Password</label>
				<div class="col-md-6">
					<input class="form-control  @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Enter Old Password" value="{{ old('password') }}">
					@error('password')
						<span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-2 col-form-label" for="password">New Password</label>
				<div class="col-md-6">
					<input class="form-control  @error('new_password') is-invalid @enderror" id="new_password" type="password" name="new_password" placeholder="Enter New Password" value="{{ old('new_password') }}">
					@error('new_password')
						<span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-2 col-form-label" for="password">Confirm Password</label>
				<div class="col-md-6">
					<input class="form-control  @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" type="password" name="new_password_confirmation" placeholder="Enter Confirm Password" value="{{ old('new_password_confirmation') }}">
					@error('new_password_confirmation')
						<span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6 offset-md-2">
					<button class="btn btn-primary float-right" type="submit"> Submit</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
@endsection