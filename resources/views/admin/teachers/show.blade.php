@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Teacher Detail</strong> <a href="#" onclick="window.history.back();" class="btn btn-primary float-right">Back</a></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<p class="card-text"><strong>Name: </strong>{{ $teacher->name }}</p>
		<p class="card-text"><strong>Email: </strong>{{ $teacher->email }}</p>
		<p class="card-text"><strong>Phone: </strong>{{ $teacher->phone }}</p>
		<p class="card-text"><strong>Address: </strong>{{ $teacher->address }}</p>
		<p class="card-text"><strong>Qualification: </strong>{{ $teacher->qualification }}</p>
		<p class="card-text"><strong>Date Of Birth: </strong>{{ $teacher->date_of_birth }}</p>
		<p class="card-text"><strong>Gender: </strong>{{ $teacher->gender }}</p>
		<p class="card-text"><strong>Status: </strong>{{ ($teacher->is_active)? "Active" : "Inactive" }}</p>
	</div>
	
</div>

@endsection

@section('js')

@stop