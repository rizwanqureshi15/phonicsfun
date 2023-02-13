@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Add New Course</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/courses')}}"  enctype="multipart/form-data">
			@include('admin.courses.form')
		</form>
	</div>
	
</div>
@endsection