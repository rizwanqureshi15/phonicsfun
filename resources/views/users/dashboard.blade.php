@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Dashbaord</strong> </div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		
		<h1>Hi {{ $user->name }}, </h1>		

		@if($user->hasRole('parent'))
		@else
			@include('users.teacher_dashboard')
		@endif
	</div>
	
</div>

@endsection

@section('js')

@stop