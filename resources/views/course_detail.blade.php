@extends('layouts.app')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                <h1 class="mb-2 bread">{{ $course->name}}</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{ $course->name}}<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftc-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
                <div class="text px-4 ftco-animate fadeInUp ftco-animated">
                    <div class="col-md-4"><img style="width:100%;" src="{{ Storage::url('courses/'. $course->image) }}"></div>
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
                            <th>Comprehensive Practice</th>
                            <td>{{ Ucfirst($course->comprehensive_practice) }}</td>
                        </tr>

                        <tr>
                            <th>Sheets</th>
                            <td>{{ Ucfirst($course->sheets) }}</td>
                        </tr>

                        <tr>
                            <th>Reading Material</th>
                            <td>{{ Ucfirst($course->reading_material) }}</td>
                        </tr>
                        <tr>
                            <th>Sight Words And It's Uses</th>
                            <td>{{ Ucfirst($course->sight_words) }}</td>
                        </tr>
                        <tr>
                            <th>Writing Activity</th>
                            <td>{{ Ucfirst($course->writing_activity) }}</td>
                        </tr>
                        <tr>
                            <th>Cost per Class</th>
                            <td>{{ $course->cost_per_class }}</td>
                        </tr>
                    </table>

                    <p align="center" class="col-md-12"><a href="{{ url('book-demo') }}" class="btn btn-secondary px-4 py-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Book a demo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
                </div>
            </div>
            <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate fadeInUp ftco-animated">
                <h2 class="mb-4">{{ $course->name}}</h2>
                <p>{{ $course->description}}</p>

            </div>
        </div>
    </div>

   <!--  <div class="container">
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
    </div> -->
</section>

@endsection