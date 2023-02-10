<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>{{ config('app.name', 'Laravel') }}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    
     <!-- Icons-->
    <!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@1.0.0-beta.0/css/all.min.css"> -->
     <link href="{{ asset('admin/vendors/coreui-icons-master/css/all.min.css') }}" rel="stylesheet">
   
    <!-- Main styles for this application-->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <style>
      .c-header.c-header-with-subheader {
          height: auto;
      }
      div.dataTables_wrapper div.dataTables_length select {
          width: 100% !important;
      }
    </style>



</head>

<body class="c-app " >
  @include('admin.includes.sidebar')
  <div class="c-wrapper">
       @if(Auth::user())
          @include('admin.includes.navbar')
        @endif
        <div class="c-body">
          <main class="c-main">
            <div class="container-fluid">
              <div class="fade-in">
              @yield('content')
              </div>
            </div>
          </main>
        </div>
        
        <!-- Footer -->
       <footer class="c-footer">
        <div><a href="#">{{ config('app.name', 'Laravel') }}</a> &copy; {{ date('Y')}}</div>
      </footer>
    </div>

    <form method="POST" action="" id="global_delete_form">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" id="delete_id">
    </form>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form id="logout-form" action="{{ url('admin/logout') }}" method="POST">
              @csrf
              <button class="btn btn-primary">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Custom scripts for all pages-->
   <script src="{{ asset('admin/js/jquery/jquery.min.js') }} "></script>
  <script src="{{ asset('admin/js/pace.min.js') }}"></script>
  <script src="{{ asset('admin/js/coreui.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/js/main.js') }}"></script>
  
  <script type="text/javascript">
    site_url = "{{ url('/') }}";
    $(document).on('click','.btn-delete-record',function(){
                
        if(confirm('Are you sure ?'))
        {
            $url = $(this).attr('href');
            $('#global_delete_form').attr('action',$url);
            $('#global_delete_form #delete_id').val($(this).data('id'));
            $('#global_delete_form').submit();
        }
        
        return false;
    });
  </script>

  @yield('js')
</body>




<!-- END main -->

</html>