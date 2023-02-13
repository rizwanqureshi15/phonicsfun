@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Edit Course</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/courses/'.$course->id)}}"  enctype="multipart/form-data">
			@method('PATCH')
	    	@include('admin.courses.form')
		</form>
	</div>
	
</div>
@endsection