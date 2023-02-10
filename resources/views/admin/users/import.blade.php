@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Import Users</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/import-users')}}" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label class="col-md-2 col-form-label" for="password">Upload File</label>
				<div class="col-md-5">
					<input class="form-control  @error('users') is-invalid @enderror" id="users" type="file" name="users" style="padding-bottom:33px;">
					@error('users')
						<span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
					@enderror
				</div>
				<div class="col-md-5">
					Click <a href="{{ url('excel_schemas/users.xlsx') }}">here </a> to downlaod schema.
				</div>
			</div>

			

			<div class="form-group row">
				<div class="col-md-5 offset-md-2">
					<button class="btn btn-primary float-right" type="submit"> Submit</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
@endsection