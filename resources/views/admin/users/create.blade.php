@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Add New User</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/users')}}">
			@include('admin.users.form')
		</form>
	</div>
	
</div>
@endsection