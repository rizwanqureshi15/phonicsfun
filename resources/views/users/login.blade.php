@extends('layouts.app')

@section('content')
<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 p-4 p-md-5 order-md-last bg-light login-margin">
                <form action="{{ route('login') }}" method="post">
                    @include('admin.includes.flashMsg')
                    @csrf
                    <div class="form-group">
                        <input type="text"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
                    </div>
                    <div class="form-group">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div></div>

        </div>
    </div>
</section>
@endsection
