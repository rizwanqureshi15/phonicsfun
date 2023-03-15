@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Parent Detail</strong> <a href="#" onclick="window.history.back();" class="btn btn-primary float-right">Back</a></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<p class="card-text"><strong>Name: </strong>{{ $parent->name }}</p>
		<p class="card-text"><strong>Email: </strong>{{ $parent->email }}</p>
		<p class="card-text"><strong>Phone: </strong>{{ $parent->phone }}</p>
		<p class="card-text"><strong>Address: </strong>{{ $parent->address }}</p>
		<p class="card-text"><strong>Gender: </strong>{{ $parent->gender }}</p>
	</div>
	
</div>

@endsection

@section('js')

@stop