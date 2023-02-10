@extends('layouts.admin')

@section('content')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="card">
	<div class="card-header"><h6 class="m-0 font-weight-bold">Users</h6></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<table class="table table-responsive-sm table-bordered" id="users-table" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created Date</th>
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
		var table = $('#users-table').DataTable( {
			stateSave: true,
			processing: true,
			serverSide: true,

			ajax: site_url+'/admin/users/get-users',
			"iDisplayLength": 10,
			"aLengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50,100,"All"]],
			columns: [
				{data: 'id', name: 'id'},
			    {data: 'name', name: 'name'},
			    {data: 'email', name: 'email'},
			    {data: 'created_at', name: 'created_at'},
			    {data: 'action', name: 'action'}
			],

		} );
	});
</script>
@stop