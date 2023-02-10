@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Settings</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/settings/')}}">
			@csrf
			@foreach($rows as $row)
			<div class="form-group row">
				<label class="col-md-2 col-form-label" for="">{{ $row['label']}}</label>
				<div class="col-md-6">
					<input class="form-control  @error('first_name') is-invalid @enderror" id="" type="text" name="setting[{{ $row['name'] }}]" value="{{ $row['value'] }}" data-required="true">
					@error($row['name'])
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			@endforeach

			<div class="form-group row">
				<div class="col-md-6 offset-md-2">
					<button class="btn btn-primary float-right" type="submit"> Submit</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
@endsection
