@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Demo Detail</strong> <a href="#" onclick="window.history.back();" class="btn btn-primary float-right">Back</a></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<p class="card-text"><strong>Parent Name: </strong>{{ $demo->parent_name }}</p>
		<p class="card-text"><strong>Email: </strong>{{ $demo->email }}</p>
		<p class="card-text"><strong>Phone: </strong>{{ $demo->phone }}</p>
		<p class="card-text"><strong>Kid Name: </strong>{{ $demo->kid_name }}</p>
		<p class="card-text"><strong>Kid Age: </strong>{{ $demo->kid_age }}</p>
		<p class="card-text"><strong>Course: </strong>{{ $demo->course->name }}</p>
		<p class="card-text"><strong>Note: </strong>{{ $demo->note }}</p>
	</div>
	
</div>

@endsection

@section('js')

@stop