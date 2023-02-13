@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
.c arousel-indicators .active{ background: #333 !important; }
.bg-dark-grey { background-color: #dfdfdf !important; }
.bg-dark { background-color: #fff !important; }
.carousel { position: initial; }
</style>
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
	<div class="col-md-6">
		<h3>The best stories are told by the KIDS!​</h3>
		<p>We thought what could be better than hearing our stories of testimony in the voice of our students & parents. You too can share your Learn2read experience with us.​</p>
	</div>
	<div class="col-md-6">
		<div class="row">
			<img class="col-md-12" src="{{ url('images/shan@Testimonial-Banner-L2R-2.webp') }}">
		</div>
	</div>
</div>
</section>

<section class="bg-dark-grey ftco-section testimony-section">
	<div class="container">
		<div class="col-md-12">
			<h3 align="center">Checkout out #ChampCam videos & hear it from our students</h3>
		</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="col-md-12">
      		<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">
      </div>
    </div>
    <div class="carousel-item">
      	<div class="col-md-12">
      		<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">
      </div>
    </div>
    <div class="carousel-item">
    	<div class="col-md-12">
      		<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">

			<img class="champcam-img" src="https://learn2read.co/wp-content/uploads/2021/07/7-150x150.png">
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</section>

<section class="ftco-section contact-section">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<h3>Share your kid's learning journey with us!</h3>
		<p>Simply fill in the information and upload your video link in the form or WhatsApp us the videos.
We would like to take your child's reading talent to the world!​</p>
	</div>
</div>
</div>
</section>

<section class="ftco-section contact-section  bg-dark-grey">
<div class="container">
<div class="row">
	<h5>Steps to follow</h5>
	<br><br>
	<div class="col-md-12">
		<div class="row">
			<div class="col-lg-6">
			<div class="services-2 d-flex">
			<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
			<div class="text">
			<h3>Record a Clips</h3>
			<p>The video can be of kids reading or learning from our resource material or parents sharing their experience with US.</p>
			</div>
			</div>
			</div>

			<div class="col-lg-6">
			<div class="services-2 d-flex">
			<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
			<div class="text">
			<h3>Share with US</h3>
			<p>The video can be of kids reading or learning from our resource material or parents sharing their experience with US.</p>
			</div>
			</div>
			</div>
		</div>
	</div>

	<br><br>
	<div class="col-md-12">
		<div class="container">
		<div class="row">
			<h4>Become an early inspiration for reading!</h4>
			<p>Help us spread the word about how our courses can help kids read and make your child an inspiration for other kids to join in the learning journey.
Either send us on WhatsApp by clicking on the button below:</p>
			<p align="center"><button class="btn btn-secondary px-4 py-3">Click here to Whatsapp Us</button></p>
		</div>
	</div>
	</div>
</div>
</section>


@endsection