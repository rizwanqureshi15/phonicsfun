@extends('layouts.app')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-center justify-content-center">
<div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
<h1 class="mb-2 bread">JUNIOR READERS COURSE</h1>
<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>JUNIOR READERS COURSE<i class="ion-ios-arrow-forward"></i></span></p>
</div>
</div>
</div>
</section>

<section class="ftco-section ftco-no-pt ftc-no-pb">
<div class="container">
<div class="row">
<div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
<div class="text px-4 ftco-animate fadeInUp ftco-animated">
<div class="col-md-4"><img style="width:100%;" src="{{ url('images/2.png') }}"></div>
<table class="table table-responsive junior-table">
	<tr>
		<th>For Age Group</th>
		<td>3 - 3.6 years</td>
	</tr>
	<tr>
		<th>Class<br>Duration</th>
		<td>40 Mins for 4:1<br>30 Mins for 1:1</td>
	</tr>
	<tr>
		<th>Classes per week</th>
		<td>3</td>
	</tr>
	<tr>
		<th>Total Classes</th>
		<td>30</td>
	</tr>
	<tr>
		<th>Batch Size</th>
		<td>3-5 Kids</td>
	</tr>
	<tr>
		<th>One-on-One</th>
		<td>Available</td>
	</tr>
	<tr>
		<th>Sight Words</th>
		<td>Yes</td>
	</tr>
	<tr>
		<th>Writing Activity</th>
		<td>No</td>
	</tr>
	<tr>
		<th>Cost per Class</th>
		<td>Rs 250 for 4:1 & Rs 416 for 1:1</td>
	</tr>
</table>
<p align="center" class="col-md-12"><a href="{{ url('book-demo') }}" class="btn btn-secondary px-4 py-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Book a demo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
</div>
</div>
<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate fadeInUp ftco-animated">
<h2 class="mb-4">Junior readers course</h2>
<p>The Junior Readers’ Course has been specially curated by teaching professionals & phonics experts for the needs of early learners in the age group of 3 to 6 years. Kids at this stage are extremely inquisitive & eager to learn and can quickly grasp concepts if taught in an easy, structured manner. Introducing their agile minds to a kids friendly course will mentally stimulate and challenge them, and will help to build a strong foundation of the language through which they can conquer the higher levels and eventually become an expert in the language. Such courses also enhance their retention and memory power. The course is for 2.5 months with a total of 30 classes divided into 3 classes per week. A batch will consist of only 3-4 kids at a time so that each child can be given personal attention. He/she will build a strong foundation for reading & writing as after understanding and learning all the letter sounds the concepts of blending, segmenting, digraphs etc. will relatively be easy to understand.</p>
<p>The course has been designed by teachers and phonics experts in such a manner that kids learn while having fun. The modules are easy to understand and are interesting enough to hold the attention of a 3 to 3.6 years child. The course focuses on the 26 letter sounds and after the course they would be able to recognise all the lower case letters and say all the phonic sounds of all the letters.</p>
<p>The Junior Reader Phonics Course is formulated by teachers and phonics experts to help your child learn the English language in a fun and interesting way. The learning will seem more play and less like studying. He/She will build a strong foundation in reading. After understanding all the letter sounds the concepts of blending, segmenting, digraphs etc. become easier to grasp and implement in further learning. Our course merges sound with lips & vocal chord movements. The acoustic characteristics and mixing of syllables along with other sound intonations are taught in the easiest way so that children learn faster and develop correct pronunciation. Understanding the basics of the language gives the child confidence to speak it without any other assistance.</p>

</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="row mt-5">
<div class="col-lg-6">
<div class="services-2 d-flex">
<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
<div class="text">
<h3>Age group 3.5 to 4 years</h3>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="services-2 d-flex">
<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
<div class="text">
<h3>Regular Classes</h3>
<p>10 week course duration</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="services-2 d-flex">
<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
<div class="text">
<h3>Certified Teachers</h3>
<p>Experienced teachers</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="services-2 d-flex">
<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
<div class="text">
<h3>Sufficient Classrooms</h3>
<p>Batch of 3-4 kids</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="services-2 d-flex">
<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
<div class="text">
<h3>Creative Lessons</h3>
<p>Homework</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="services-2 d-flex">
<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-kids"></span></div>
<div class="text">
<h3>Sports Facilities</h3>
<p>Take care of sports</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


@endsection