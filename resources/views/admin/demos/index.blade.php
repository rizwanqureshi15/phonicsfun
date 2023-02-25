@extends('layouts.admin')

@section('content')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="card">
	<div class="card-header"><h6 class="m-0 font-weight-bold">Demos</h6></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<table class="table table-responsive-sm table-bordered" id="demos-table" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Parent Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Kid Name</th>
					<th>Kid Age</th>
					<th>Course</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
	
</div>
@endsection


@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#demos-table').DataTable( {
			stateSave: true,
			processing: true,
			serverSide: true,

			ajax: site_url+'/admin/demos/get-demos',
			"iDisplayLength": 10,
			"aLengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50,100,"All"]],
			columns: [
				{data: 'parent_name', name: 'parent_name'},
			    {data: 'email', name: 'email'},
			    {data: 'phone', name: 'phone'},
			    {data: 'kid_name', name: 'kid_name'},
			    {data: 'kid_age', name: 'kid_age'},
			    {data: 'course_id', name: 'course_id'},
			    {data: 'action', name: 'action'}
			],

		} );
	});
</script>
@stop