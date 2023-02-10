<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.0.0-alpha.1
* @link https://coreui.io
* Copyright (c) 2019 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>{{ config('app.name', 'Laravel') }}</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    
     <!-- Icons-->
   <!-- <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@1.0.0-beta.0/css/free.min.css"> -->
   <link href="{{ asset('admin/vendors/coreui-icons-master/css/all.min.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('admin/css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/pace-progress/css/pace.min.css') }}" rel="stylesheet">

</head>
  <body class="c-app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <form class="" method="POST" action="{{ route('adminLogin') }}">
                  @csrf
                  @include('admin.includes.flashMsg')
                  <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text">
                      <i class="cil-user"></i>
                      </span></div>
                    <input name="email" class="form-control" type="text" placeholder="Enter Email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend"><span class="input-group-text">
                      <i class="cil-lock-locked"></i>
                        </span></div>
                    <input name="password" class="form-control" type="password" placeholder="Password">
                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <!-- <div class="col-6 text-right">
                      <button class="btn btn-link px-0" type="button">Forgot password?</button>
                    </div> -->
                  </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
     <script src="{{ asset('admin/js/pace.min.js') }}"></script>
    <script src="{{ asset('admin/js/coreui.bundle.min.js') }}"></script>
  </body>
</html>