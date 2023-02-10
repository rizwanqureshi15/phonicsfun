@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>User Detail</strong> <a href="#" onclick="window.history.back();" class="btn btn-primary float-right">Back</a></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<p class="card-text"><strong>Name: </strong>{{ $user->name }}</p>
		<p class="card-text"><strong>Email: </strong>{{ $user->email }}</p>
	</div>
	
</div>

@endsection

@section('js')

@stop