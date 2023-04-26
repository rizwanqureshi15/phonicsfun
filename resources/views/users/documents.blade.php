@extends('layouts.admin')

@section('content')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<style type="text/css">
	
</style>

<div class="card">
	<div class="card-header"><strong>Documents</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<table class="table table-responsive-sm table-bordered" id="documents-table" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>Uploaded By</th>
				<th>Lesson</th>
				<th>Uploaded Date</th>
			</tr>
		</thead>
		<tbody>
			@foreach($documents as $document)
            <tr>
                <td>{{ $document->name }}</td>
               	<td>{{ $document->teacher->name }}</td>
               	<td><a href='{{ url("my-jobs")}}/{{ $document->lesson->batch->id }}'>{{ $document->lesson->batch->name }}</a></td>
                <td>{{ $document->created_at->diffForHumans() }}</td>
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
		var table = $('#documents-table').DataTable( {
			"iDisplayLength": 10,
			"aLengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50,100,"All"]],
		} );

	});
</script>
@stop