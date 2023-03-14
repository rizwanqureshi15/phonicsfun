@if(Auth::guard('admin')->user())
<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
  <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="assets/brand/coreui-base.svg" width="97" height="46" alt="CoreUI Logo"></a>
  <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
  <!-- <ul class="c-header-nav d-md-down-none">
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
  </ul> -->
  <ul class="c-header-nav ml-auto mr-4">
    <!-- <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
      <i class="c-sidebar-nav-icon cil-bell"></i>
    </a></li>
    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
      <i class="c-sidebar-nav-icon cil-list-rich"></i>
       </a></li>
    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
      <i class="c-sidebar-nav-icon cil-envelope-open"></i>
    </a></li> -->
    <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('admin/images/avatars/placeholderprofile.png') }}" alt="{{ Auth::guard('admin')->user()->name }}"></div>
    </a>
    <div class="dropdown-menu dropdown-menu-right pt-0">
        <!-- <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
          <a class="dropdown-item" href="#">
          <i class="c-sidebar-nav-icon cil-bell"></i>
         Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item" href="#">
           <i class="c-sidebar-nav-icon cil-envelope-open"></i>
         Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item" href="#">
            <i class="c-sidebar-nav-icon cil-task"></i>
         Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item" href="#">
           <i class="c-sidebar-nav-icon cil-comment-square"></i>
           Comments<span class="badge badge-warning ml-auto">42</span></a> -->
           <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
           <a class="dropdown-item" href="{{ url('admin/change-password') }}">
            <i class="c-sidebar-nav-icon cil-settings"></i>
          Change Password</a>
          <a class="dropdown-item" href="{{ url('admin/settings') }}">
            <i class="c-sidebar-nav-icon cil-settings"></i>
          Settings</a>
          <div class="dropdown-divider"></div><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="c-sidebar-nav-icon cil-account-logout"></i>
          Logout</a>
        </div>
      </li>

    </ul>
  <!-- <div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div> -->
</header>
@else
<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
  <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="assets/brand/coreui-base.svg" width="97" height="46" alt="CoreUI Logo"></a>
  <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
  <!-- <ul class="c-header-nav d-md-down-none">
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
  </ul> -->
  <ul class="c-header-nav ml-auto mr-4">
    <!-- <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
      <i class="c-sidebar-nav-icon cil-bell"></i>
    </a></li>
    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
      <i class="c-sidebar-nav-icon cil-list-rich"></i>
       </a></li>
    <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="#">
      <i class="c-sidebar-nav-icon cil-envelope-open"></i>
    </a></li> -->
    <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('admin/images/avatars/placeholderprofile.png') }}" alt="{{ Auth::guard('web')->user()->name }}"></div>
    </a>
    <div class="dropdown-menu dropdown-menu-right pt-0">
        <!-- <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
          <a class="dropdown-item" href="#">
          <i class="c-sidebar-nav-icon cil-bell"></i>
         Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item" href="#">
           <i class="c-sidebar-nav-icon cil-envelope-open"></i>
         Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item" href="#">
            <i class="c-sidebar-nav-icon cil-task"></i>
         Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item" href="#">
           <i class="c-sidebar-nav-icon cil-comment-square"></i>
           Comments<span class="badge badge-warning ml-auto">42</span></a> -->
           <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
           <a class="dropdown-item" href="{{ url('change-password') }}">
            <i class="c-sidebar-nav-icon cil-settings"></i>
          Change Password</a>
         
          <div class="dropdown-divider"></div><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutUserModal">
            <i class="c-sidebar-nav-icon cil-account-logout"></i>
          Logout</a>
        </div>
      </li>

    </ul>
  <!-- <div class="c-subheader px-3">
    <ol class="breadcrumb border-0 m-0">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><a href="#">Admin</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div> -->
</header>
@endif
