@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Edit User</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/users/'.$user->id)}}">
			@method('PATCH')
	    	@include('admin.users.form')
		</form>
	</div>
	
</div>
@endsection