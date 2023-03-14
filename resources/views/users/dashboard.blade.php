@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Dashbaord</strong> <a href="#" onclick="window.history.back();" class="btn btn-primary float-right">Back</a></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		
	</div>
	
</div>

@endsection

@section('js')

@stop