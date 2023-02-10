@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Content Management</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/content-management')}}">
			@csrf
			@foreach($rows as $row)
			<div class="form-group row">
				<label class="col-md-2 col-form-label" for="">{{ $row['label']}}</label>
				<div class="col-md-10">
					<textarea class="form-control  @error('first_name') is-invalid @enderror" id="{{ $row['name'] }}" name="content_management[{{ $row['name'] }}]">{{ $row['value'] }}</textarea>
					@error($row['name'])
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			@endforeach

			<div class="form-group row">
				<div class="col-md-10 offset-md-2">
					<button class="btn btn-primary float-right" type="submit"> Submit</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
@endsection

@section('js')
<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'ABOUT_US' );
	CKEDITOR.replace( 'PRIVACY_POLICY' );
	CKEDITOR.replace( 'TERMS_AND_CONDITION' );
</script>

@endsection
