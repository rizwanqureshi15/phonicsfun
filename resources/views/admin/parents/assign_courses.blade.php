@extends('layouts.admin')

@section('content')
<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/datetimepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<div class="card">
	<div class="card-header"><strong>Assign Course</strong></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')
		<form class="form-horizontal" method="POST" action="{{ url('admin/assign-courses')}}" enctype="multipart/form-data">
			@csrf
			
	    	@include('admin.parents._assign_courses')
		</form>
	</div>
	
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/datetimepicker/js/moment.min.js') }}"></script>
<script src="{{ asset('plugins/datetimepicker/js/daterangepicker.js') }}"></script>
<script>
$(function() {

    $('#student_id').select2();
    $('#start_date').daterangepicker({
        singleDatePicker: true,
        locale: {
          format: 'YYYY-MM-DD',
        },
    });

    $('#start_time').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        timeOnly: true,
        locale: {
          format: 'HH:mm',
        },
    }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
    });


    $('#end_time').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        timeOnly: true,
        locale: {
          format: 'HH:mm',
        },
    }).on('show.daterangepicker', function (ev, picker) {
            picker.container.find(".calendar-table").hide();
    });

});
</script>
@endsection
