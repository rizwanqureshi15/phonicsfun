@extends('layouts.app')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                <h1 class="mb-2 bread">Book a demo</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Book a demo <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row">
            <h3>BOOK A FREE TRIAL CLASS WITH US!</h3>
            <p>Everything begins with a first step. Book a free online class now and begin the journey of learn to read. Our online courses will make your child an avid reader in an early age.</p>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
        <div class="container">
             @include('admin.includes.flashMsg')
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-12 p-4 p-md-5 order-md-last bg-light">
                    <h3>Book a Free Demo</h3>
                    <p>Enter details to book a free demo here!</p>
                   
                    <form class="form-horizontal" method="POST" action="{{ url('book-demo')}}" >
                        @csrf 
                        <div class="form-group">
                            <input class="form-control  @error('parent_name') is-invalid @enderror" id="parent_name" type="text" name="parent_name" placeholder="Enter Parent's Name" value="{{ old('parent_name') }}">
                            @error('parent_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control  @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control  @error('phone') is-invalid @enderror" id="phone" type="text" name="phone" placeholder="Enter Phone No. with code (Eg +91-XXXXXXXXXX)" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <input class="form-control  @error('kid_name') is-invalid @enderror" id="kid_name" type="text" name="kid_name" placeholder="Enter Kid's Name" value="{{ old('kid_name') }}">
                            @error('kid_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <input class="form-control  @error('kid_age') is-invalid @enderror" id="kid_age" type="text" name="kid_age" placeholder="Enter Kid's Age" value="{{ old('kid_age') }}">
                            @error('kid_age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <select class="form-control" name="course_id">
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}" class="option selected focus">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="note" id="" cols="30" rows="7" class="form-control" placeholder="Query (if any)"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    @endsection