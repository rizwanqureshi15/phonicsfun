@extends('layouts.admin')

@section('content')
<link href="{{ asset('plugins/datetimepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

<div class="card">
	<div class="card-header"><strong>Edit Parent</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/parents/'.$parent->id)}}" enctype="multipart/form-data">
			@method('PATCH')
	    	@include('admin.parents.form')
		</form>
	</div>
	
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/datetimepicker/js/moment.min.js') }}"></script>
<script src="{{ asset('plugins/datetimepicker/js/daterangepicker.js') }}"></script>
<script>
$(function() {
	$('input[name="date_of_birth"]').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		locale: {
			format: 'YYYY-MM-DD'
		}
	});

});


</script>
@endsection