@extends('layouts.admin')

@section('content')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<style type="text/css">
	
</style>

<div class="card">
	<div class="card-header"><strong>{{ $batch->name }}</strong> <a href="#" onclick="window.history.back();" class="btn btn-primary float-right">Back</a> </div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<table class="table table-responsive-sm table-bordered" id="jobs-table" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Date</th>
				<th>Student</th>
				<th>Attendance</th>
				<th>Class Status</th>
				<th>Documents</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($jobs as $job)
            <tr>
                <td>{{ $job->date}}</td>
		        <td>
		        	@foreach($job->students as $k => $student)
                		{{ ($k != 0) ? ', ': '' }}{{ $student->name }} 
                	@endforeach
                </td>

                <td>
		        	@foreach($job->students as $k => $student)
		        		{{ ($k != 0) ? ', ': '' }}
                		@foreach($lesson_students as $lesson_student)
                			@if($lesson_student->student_id == $student->id && $lesson_student->lesson_id == $job->id && $lesson_student->attendance)
                				Present
                			@elseif($lesson_student->student_id == $student->id && $lesson_student->lesson_id == $job->id)
                				Absent
                			@endif
                		@endforeach
                	@endforeach
                </td>
		        
		        <td>{{ App\Models\Lesson::getStatusName($job->status)}}</td>
		        <td>
		        	@foreach($job->documents as $k => $document)
                		<a href="{{ Storage::url('documents/'. $job->id .'/'. $document->name) }}"  target="_blank">{{  $document->name }}</a>
                	@endforeach
                </td>
                
                
            </tr>
            @endforeach
        </tbody>
	</table>
		
	</div>
	
</div>

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#open-jobs-table').DataTable( {
			"iDisplayLength": 10,
			"aLengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50,100,"All"]],
		} );

		var table2 = $('#finish-jobs-table').DataTable( {
			"iDisplayLength": 10,
			"aLengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50,100,"All"]],
		} );
	});
</script>
@stop