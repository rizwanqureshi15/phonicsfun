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

		<hr>
		<h6><strong>Students</strong></h6>


		<div class="col-md-6 pl-0">
			<ul class="list-group  list-group-flush">
				@foreach($students as $student)
			  		<li class="list-group-item">{{ $student->name }} <a href="{{ url('admin/assign-courses/'.$student->id )}}" class="btn btn-primary float-right">Assign Course</a></li>
			  	@endforeach
			</ul>
		</div>
		
		<form class="form-horizontal" method="POST" action="{{ url('admin/parents/add-student')}}">
			@csrf
			<div class="mt-2">
				<input type="hidden" name="parent_id" value="{{ $parent->id }}">
				<div class="form-group row">
				    <div class="col-md-6">
				        <input class="form-control  @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Enter student Name" value="{{ old('name') }}">
				        @error('name')
				            <span class="invalid-feedback" role="alert">
				                <strong>{{ $message }}</strong>
				            </span>
				        @enderror
				    </div>
				</div>

				<div class="form-group">
				  <div class="col-md-4">
				    <button id="add-more" class="btn btn-primary" type="submit">Add</button>
				  </div>
				</div>

			</div>
		</form>

	</div>
	
</div>



@endsection

@section('js')

@stop