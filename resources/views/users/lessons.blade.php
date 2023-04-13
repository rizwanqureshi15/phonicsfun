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
				<th>Client</th>
				<th>Student</th>
				<th>Date</th>
				<th>Status</th>
				<th>Tutor Rate</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($jobs as $job)
            <tr>
                <td>
		        	@foreach($job->batch->students as $k => $student)
                		{{ ($k != 0) ? ', ': '' }}{{ $student->user->name }} 
                	@endforeach
                </td>
		        <td>
		        	@foreach($job->batch->students as $k => $student)
                		{{ ($k != 0) ? ', ': '' }}{{ $student->name }} 
                	@endforeach
                </td>
		        <td>{{ $job->date}}</td>
		        <td>{{ App\Models\Lesson::getStatusName($job->status)}}</td>
                <td>Rs {{ number_format($job->batch->tutor_rate, 2 )}}</td>
                <td><a href='{{ url("my-jobs")}}/{{ $job->batch->id }}/{{ $job->id }}' class="btn btn-primary" title="edit"><i class="cil-pencil"></i></a>
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