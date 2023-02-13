@extends('layouts.admin')

@section('content')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="card">
	<div class="card-header"><h6 class="m-0 font-weight-bold">Courses</h6></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<table class="table table-responsive-sm table-bordered" id="courses-table" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Category</th>
					<th>Status</th>
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
		var table = $('#courses-table').DataTable( {
			stateSave: true,
			processing: true,
			serverSide: true,

			ajax: site_url+'/admin/courses/get-courses',
			"iDisplayLength": 10,
			"aLengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50,100,"All"]],
			columns: [
				{data: 'image', name: 'image'},
			    {data: 'name', name: 'name'},
			    {data: 'category.name', name: 'category.name'},
			    {data: 'is_active', name: 'is_active'},
			    {data: 'action', name: 'action'}
			],

		} );
	});
</script>
@stop