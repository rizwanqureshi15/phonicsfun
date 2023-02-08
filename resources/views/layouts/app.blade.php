<!DOCTYPE html>
<html lang="en">
<head>
<title>Kiddos - Free Bootstrap 4 Template by Colorlib</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="py-2 bg-primary">
<div class="container">
<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
<div class="col-lg-12 d-block">
<div class="row d-flex">
<div class="col-md-5 pr-4 d-flex topper align-items-center">
<div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
<span class="text">198 West 21th Street, Suite 721 New York NY 10016</span>
</div>
<div class="col-md pr-4 d-flex topper align-items-center">
<div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
<span class="text"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d1a8bea4a3b4bcb0b8bd91b4bcb0b8bdffb2bebc">[email&#160;protected]</a></span>
</div>
<div class="col-md pr-4 d-flex topper align-items-center">
<div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
<span class="text">+ 1235 2355 98</span>
</div>
</div>
</div>
</div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
<div class="container d-flex align-items-center">
<a class="navbar-brand" href="{{ url('/') }}">Kiddos</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
<span class="oi oi-menu"></span> Menu
</button>
<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav ml-auto">
<li class="nav-item active"><a href="{{ url('/') }}" class="nav-link pl-0">Home</a></li>
<li class="nav-item"><a href="{{ url('about') }}" class="nav-link">About</a></li>
<li class="nav-item"><a href="{{ url('teachers') }}" class="nav-link">Teacher</a></li>
<li class="nav-item"><a href="{{ url('courses') }}" class="nav-link">Courses</a></li>
<li class="nav-item"><a href="{{ url('price') }}" class="nav-link">Pricing</a></li>
<li class="nav-item"><a href="{{ url('blogs') }}" class="nav-link">Blog</a></li>
<li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>

@guest
	<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
@else
	<li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest

</ul>
</div>
</div>
</nav>
	
	@yield('content')


<footer class="ftco-footer ftco-bg-dark ftco-section">
<div class="container">
<div class="row mb-5">
<div class="col-md-6 col-lg-3">
<div class="ftco-footer-widget mb-5">
<h2 class="ftco-heading-2">Have a Questions?</h2>
<div class="block-23 mb-3">
<ul>
<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
<li><a href="#"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="82ebece4edc2fbedf7f0e6edefe3ebecace1edef">[email&#160;protected]</span></span></a></li>
</ul>
</div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="ftco-footer-widget mb-5">
<h2 class="ftco-heading-2">Recent Blog</h2>
<div class="block-21 mb-4 d-flex">
<a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
<div class="text">
<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
<div class="meta">
<div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
<div><a href="#"><span class="icon-person"></span> Admin</a></div>
<div><a href="#"><span class="icon-chat"></span> 19</a></div>
</div>
</div>
</div>
<div class="block-21 mb-5 d-flex">
<a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
<div class="text">
<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
<div class="meta">
<div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
<div><a href="#"><span class="icon-person"></span> Admin</a></div>
<div><a href="#"><span class="icon-chat"></span> 19</a></div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="ftco-footer-widget mb-5 ml-md-4">
<h2 class="ftco-heading-2">Links</h2>
<ul class="list-unstyled navbar-nav mr-auto">
<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Deparments</a></li>
<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
@guest
	<li><a href="{{ route('logout') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Login</a></li>
@else
	<li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest
</ul>
</div>
</div>
<div class="col-md-6 col-lg-3">
<div class="ftco-footer-widget mb-5">
<h2 class="ftco-heading-2">Subscribe Us!</h2>
<form action="#" class="subscribe-form">
<div class="form-group">
<input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
<input type="submit" value="Subscribe" class="form-control submit px-3">
</div>
</form>
</div>
<div class="ftco-footer-widget mb-5">
<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
</ul>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 text-center">
<p>
Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
</p>
</div>
</div>
</div>
</footer>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"77addbcebb9789f6","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>
</html>