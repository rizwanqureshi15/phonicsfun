@extends('layouts.app')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
				<h1 class="mb-2 bread">Our Courses</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
            <div class="col-md-6 col-lg-4 ftco-animate">
                @foreach($courses as $course)
                <div class="pricing-entry bg-light pb-4 text-center">
                    <div>
                        <p><span class="price">{{ $course->category->name }}</span></p>
                        <h3 class="mb-3">{{ $course->name }} </h3>
                        
                    </div>
                    <div class="img" style="background-image: url({{ Storage::url('courses/'. $course->image) }});"></div>

                    <table class="table table-responsive junior-table">
                            <tr>
                                <th>For Age Group</th>
                                <td>{{ $course->age_group }}</td>
                            </tr>
                            <tr>
                                <th>Class<br>Duration</th>
                                <td>{{ $course->duration }}</td>
                            </tr>
                            <tr>
                                <th>Classes per week</th>
                                <td>{{ $course->classes_per_week }}</td>
                            </tr>
                            <tr>
                                <th>Total Classes</th>
                                <td>{{ $course->total_classes }}</td>
                            </tr>
                           
                            <tr>
                                <th>Cost per Class</th>
                                <td>{{ $course->cost_per_class }}</td>
                            </tr>
                        </table>

                    <p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">View Course</a></p>
                </div>
                @endforeach
            </div>
            
        </div>
	</div>
</section>

@endsection