@if(Auth::guard('admin')->user())

<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
      <!-- <img class="c-sidebar-brand-full" src="" width="118" height="46" alt="CoreUI Logo"> -->
      {{ config('app.name', 'Laravel') }}
    </div>
    
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ Request::is('admin/dashboard') ? 'c-active' : '' }}" href="{{ url('admin/dashboard') }}">
          <i class="c-sidebar-nav-icon cil-speedometer"></i>
          Dashboard
          <!-- <span class="badge badge-info">NEW</span> -->
        </a>
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon cil-user"></i>
          Manage Courses</a>
        <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ Request::is('admin/courses') ? 'active' : '' }}" href="{{ url('admin/courses') }}">
              <span class="c-sidebar-nav-icon"></span> Courses
            </a>

            <a class="c-sidebar-nav-link {{ Request::is('admin/courses/create') ? 'active' : '' }}" href="{{ url('admin/courses/create') }}">
              <span class="c-sidebar-nav-icon"></span> Add New
            </a>
          </li>
         
        </ul>
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon cil-user"></i>
          Manage Demos</a>
        <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ Request::is('admin/demos') ? 'active' : '' }}" href="{{ url('admin/demos') }}">
              <span class="c-sidebar-nav-icon"></span> Demos
            </a>

           
          </li>
         
        </ul>
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon cil-user"></i>
          Manage Teachers</a>
        <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ Request::is('admin/teachers') ? 'active' : '' }}" href="{{ url('admin/teachers') }}">
              <span class="c-sidebar-nav-icon"></span> Teachers
            </a>

             <a class="c-sidebar-nav-link {{ Request::is('admin/teachers/create') ? 'active' : '' }}" href="{{ url('admin/teachers/create') }}">
              <span class="c-sidebar-nav-icon"></span> Add New
            </a>
          </li>
         
        </ul>
      </li>

      <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon cil-user"></i>
          Manage Parents</a>
        <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ Request::is('admin/parents') ? 'active' : '' }}" href="{{ url('admin/parents') }}">
              <span class="c-sidebar-nav-icon"></span> Parents
            </a>

             <a class="c-sidebar-nav-link {{ Request::is('admin/parents/create') ? 'active' : '' }}" href="{{ url('admin/parents/create') }}">
              <span class="c-sidebar-nav-icon"></span> Add New
            </a>
          </li>
         
        </ul>
      </li>

       <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon cil-user"></i>
         Assign courses</a>
        <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ Request::is('admin/assign-courses') ? 'active' : '' }}" href="{{ url('admin/assign-courses') }}">
              <span class="c-sidebar-nav-icon"></span> Assign courses
            </a>

            
          </li>
         
        </ul>
      </li>

    <!--   <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
          <i class="c-sidebar-nav-icon cil-user"></i>
          Manage Users</a>
        <ul class="c-sidebar-nav-dropdown-items">
          <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('admin/users') }}">
              <span class="c-sidebar-nav-icon"></span> Users
            </a>
          </li>
         
        </ul>
      </li> -->

      
    </ul>
   


    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
@else



<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
      <!-- <img class="c-sidebar-brand-full" src="" width="118" height="46" alt="CoreUI Logo"> -->
      {{ config('app.name', 'Laravel') }}
    </div>
    
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ Request::is('dashboard') ? 'c-active' : '' }}" href="{{ url('dashboard') }}">
          <i class="c-sidebar-nav-icon cil-speedometer"></i>
          Dashboard
          <!-- <span class="badge badge-info">NEW</span> -->
        </a>
      </li>

      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ Request::is('calendar') ? 'c-active' : '' }}" href="{{ url('calendar') }}">
          <i class="c-sidebar-nav-icon cil-speedometer"></i>
          Calendar
          <!-- <span class="badge badge-info">NEW</span> -->
        </a>
      </li>

      @if(Auth::guard('web')->user()->hasRole('teacher'))
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ Request::is('my-jobs') ? 'c-active' : '' }}" href="{{ url('my-jobs') }}">
          <i class="c-sidebar-nav-icon cil-speedometer"></i>
          My Jobs
          <!-- <span class="badge badge-info">NEW</span> -->
        </a>
      </li>
      @else

      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ Request::is('classes') ? 'c-active' : '' }}" href="{{ url('classes') }}">
          <i class="c-sidebar-nav-icon cil-speedometer"></i>
          Classes
          <!-- <span class="badge badge-info">NEW</span> -->
        </a>
      </li>
      @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>

@endif
