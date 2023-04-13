@extends('layouts.admin')

@section('content')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<style type="text/css">
	
</style>

<div class="card">
	<div class="card-header"><strong>Classes</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<table class="table table-responsive-sm table-bordered" id="jobs-table" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>Students</th>
				<th>Created At</th>
			</tr>
		</thead>
		<tbody>
			@foreach($jobs as $job)
            <tr>
                <td><a href='{{ url("classes")}}/{{ $job->id }}'>{{ $job->name }}</a></td>
                <td>
		        	@foreach($job->students as $k => $student)
                		{{ ($k != 0) ? ', ': '' }}{{ $student->name }} 
                	@endforeach
                </td>
		        
                <td>{{ Carbon\Carbon::parse($job->created_at)->format('Y-m-d') }}</td>
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
		var table = $('#jobs-table').DataTable( {
			"iDisplayLength": 10,
			"aLengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50,100,"All"]],
		} );

	});
</script>
@stop