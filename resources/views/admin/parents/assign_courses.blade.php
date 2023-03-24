@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header"><strong>Assign Course</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/assign-courses/'.$student->id)}}" enctype="multipart/form-data">
			@method('PATCH')
			<input type="hidden" name="student_id" value="{{ $student->id }}">
			<div class="form-group row">
			    <label class="col-md-2 col-form-label" for="name">Name</label>
			    <div class="col-md-6">
			        <input class="form-control  @error('name') is-invalid @enderror " id="name" type="text" name="name" placeholder="Enter Name" value="{{ (isset($student))? $student->name : old('name') }}" disabled>
			        @error('name')
			            <span class="invalid-feedback" role="alert">
			                <strong>{{ $message }}</strong>
			            </span>
			        @enderror
			    </div>
			</div>
	    	
	    	<div class="form-group row">
			    <label class="col-md-2 col-form-label" for="gender">Courses</label>
			    <div class="col-md-6">
			       
			         <select class="form-control @error('gender') is-invalid @enderror" id="course_id" name="course_id">
			            @foreach($courses as $course)
			             <option value="{{ $course->id }}"
			            @if(isset($student) && $student->id == $course->id )
			                selected="selected" 
			            @endif
			             >{{ $course->name }}</option>
			            @endforeach
			           
			        </select>

			        @error('course_id')
			            <span class="invalid-feedback" role="alert">
			                <strong>{{ $message }}</strong>
			            </span>
			        @enderror
			    </div>
			</div>

			<div class="form-group row">
			    <label class="col-md-2 col-form-label" for="gender">Teacher</label>
			    <div class="col-md-6">
			       
			         <select class="form-control @error('gender') is-invalid @enderror" id="teacher_id" name="teacher_id">
			            @foreach($teachers as $teacher)
			             <option value="{{ $course->id }}"
			            @if(isset($student) && $student->id == $teacher->id )
			                selected="selected" 
			            @endif
			             >{{ $teacher->name }}</option>
			            @endforeach
			           
			        </select>

			        @error('teacher_id')
			            <span class="invalid-feedback" role="alert">
			                <strong>{{ $message }}</strong>
			            </span>
			        @enderror
			    </div>
			</div>

			<div class="form-group row">
			    <div class="col-md-6 offset-md-2">
			        <button class="btn btn-primary float-right" type="submit"> Submit</button>
			    </div>
			</div>
		</form>
	</div>
	
</div>
@endsection

@section('js')
<script>


</script>
@endsection