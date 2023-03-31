@extends('layouts.admin')

@section('content')

<link rel="stylesheet" ref="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

</style>
<div class="card">
	<div class="card-header"><strong>Calendar</strong> <a href="#" onclick="window.history.back();" class="btn btn-primary float-right">Back</a></div>
	<div class="card-body">
		@include('admin.includes.flashMsg')

		<div id='calendar'></div>
	</div>
	
</div>



@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script>

<script>
    $(document).ready(function () {
        var calendarEl = document.getElementById('calendar');
        var student_id = "{{ $student->id }}";
        var url = site_url + "admin/parents/students/"+student_id+"/getEvent";
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          	initialView: 'dayGridMonth',
           	headerToolbar: {
	            left: 'prev,next today',
	            center: 'title',
	            right: 'dayGridMonth,timeGridWeek,timeGridDay'
	        },
	        navLinks: true,
	        editable: true,
	        events: site_url + "/admin/parents/students/"+student_id+"/getEvent",           
            displayEventTime: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }


            },

            
        });
        calendar.render();
      
    });
</script>


@stop