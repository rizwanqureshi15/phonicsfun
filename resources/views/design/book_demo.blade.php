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
<div class="row d-flex align-items-stretch no-gutters">
<div class="col-md-12 p-4 p-md-5 order-md-last bg-light">
	<h3>Book a Free Demo</h3>
	<p>Enter details to book a free demo here!</p>
<form action="#">
<div class="form-group">
<input type="text" class="form-control" placeholder="Enter Parent's Name">
</div>
<div class="form-group">
<input type="email" class="form-control" placeholder="Enter Email">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Enter Phone No. with code (Eg +91-XXXXXXXXXX)">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Enter Kid's Name">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Enter Kid's Age">
</div>
<div class="form-group">
<select class="form-control">
<option data-value="" class="option selected focus">---</option>
<option data-value="Phonics for Kids" class="option">Phonics for Kids</option>
<option data-value="Hindi for Kids" class="option">Hindi for Kids</option>
<option data-value="English Grammar for Kids" class="option">English Grammar for Kids</option>
<option data-value="Math for kids" class="option">Math for kids</option>
</select>
</div>
<div class="form-group">
<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Query (if any)"></textarea>
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