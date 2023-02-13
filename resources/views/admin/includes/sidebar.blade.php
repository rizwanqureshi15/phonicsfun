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