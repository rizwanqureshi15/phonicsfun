@extends('layouts.admin')

@section('content')
<style type="text/css">
	.clock-warning{
		font-size: 44px;
		color: #815c15;
		font-weight: bold;
	}

	.clock-success{
		font-size: 44px;
		color: #18603a;
		font-weight: bold;
	}

	.clock-danger{
		font-size: 44px;
		color: #772b35;
		font-weight: bold;
	}
</style>

<div class="card">
	<div class="card-header"><strong>Lesson: {{ $lesson->batch->name }}</strong> <a href="#" onclick="window.history.back();" class="btn btn-primary float-right">Back</a> </div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		
		<div class="row">
			<div class="offset-md-4 col-md-4">
				<div class="card text-center">
				  <div class="card-body">
				  	@if($lesson->status == 2)
				  		<i class="cil-clock clock-danger"></i>
				    	<h4 class="card-title alert alert-danger mt-2">Cancelled</h4>
				    	<p class="card-text text-muted">This lesson has been mark as cancelled.</p>
				    @elseif($lesson->status == 3)	
				    	<i class="cil-clock clock-success"></i>
				    	<h4 class="card-title alert alert-success mt-2">Completed</h4>
				    	<p class="card-text text-muted">This lesson has been mark as complete.</p>
				    @else
				    	<i class="cil-clock clock-warning"></i>
				    	<h4 class="card-title alert alert-warning mt-2">Awaiting confirmation</h4>
				    	<p class="card-text text-muted">This lesson has not been mark as complete yet.</p>
				    @endif


				    <h5 class="card-title">{{  Carbon\Carbon::parse($lesson->date.' '. $lesson->start_time.':0')->format('g:i A') }} - {{ Carbon\Carbon::parse($lesson->date.' '.$lesson->end_time.':0')->format('g:i A') }}</h5>

				    <p class="card-text">{{  Carbon\Carbon::parse($lesson->date)->format('l d F') }}</p>
				    @if($lesson->status == 0 || $lesson->status == 1)
				    <a href='{{ url("my-jobs/complete") }}' class="btn btn-success btn-delete-record" title="delete" data-id="{{ $lesson->id }}'">Complete</a>
				    	<a href='{{ url("my-jobs/cancelled") }}' class="btn btn-danger btn-delete-record" title="delete" data-id="{{ $lesson->id }}'">Cancelled</a>
				    @endif
				  </div>
				</div>
			</div>
			
		</div>

		<div class="row mt-5">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
					    <strong>Students</strong>
					</div>
				  	<div class="card-body">
				  		@foreach($lesson->batch->students as $student)
				  		<div class="row">
				  			<div class="col-md-10">
				  				<p class="card-text">{{  $student->name }} (Client: {{  $student->user->name }})</p>		
				  			</div>

				  			<div class="col-md-2">
				  				<label class="c-switch c-switch-label c-switch-pill c-switch-success">
		                        		<input class="c-switch-input attendance" value="1" type="checkbox" 
		                        		@foreach($lesson_students as $lesson_student)
		                        			@if($lesson_student->student_id == $student->id && $lesson_student->attendance)
		                        				data-id="{{ $lesson_student->id }}" checked
		                        			@elseif($lesson_student->student_id == $student->id)
		                        				data-id="{{ $lesson_student->id }}"
		                        			@endif
		                        		@endforeach
		                        		>
		                        		<span class="c-switch-slider" data-checked="✓" data-unchecked="✕"></span>
		                      	</label>
				  			</div>
				  		</div>
				  		

				  		
				  		@endforeach
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
					    <strong>Tutor</strong>
					</div>
				  	<div class="card-body">
				  		<p class="card-text">{{  $lesson->batch->teacher->name }}</p>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
					    <strong>Documents</strong>
					</div>
				  	<div class="card-body">
				  		<p class="card-text">No Documents</p>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
					    <strong>Payment Orders</strong>
					</div>
				  	<div class="card-body">
				  		<p class="card-text">No Payment Orders</p>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
</div>

@endsection

@section('js')

<script type="text/javascript">
   $(document).ready(function() {

    $('.attendance').change(function() {
    	var id = $(this).data("id");
    	var attendance = 0;
        if(this.checked) {
            attendance = 1;
        }
        
        $.ajax({
			url: site_url+'/toggel-attendance',
            type: "POST",
            data:{id:id, attendance:attendance},
            
           success:function(data){
               
           },
           error: function (error) {
                // window.location.reload();
           }
        });  

    });

    $(".attendance").trigger("change");
});

  </script>
@stop