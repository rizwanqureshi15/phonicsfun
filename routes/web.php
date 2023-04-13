<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DemosController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\ParentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home']);
Route::get('about', [HomeController::class, 'about']);
Route::get('courses', [HomeController::class, 'courses']);
Route::get('price', [HomeController::class, 'price']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('teachers', [HomeController::class, 'teachers']);
Route::get('blogs', [HomeController::class, 'blogs']);

Route::get('junior-readers-course', [HomeController::class, 'junior_readers_course']);
Route::get('champcam', [HomeController::class, 'champcam']);

Route::get('book-demo', [HomeController::class, 'bookDemo']);
Route::post('book-demo', [HomeController::class, 'postBookDemo']);

// Auth::routes();
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/change-password', [UserController::class, 'changePassword']);
Route::post('/change-password', [UserController::class, 'postChangePassword']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('calendar', [App\Http\Controllers\DashboardController::class, 'calendar']);
Route::get('users/getEvent', [App\Http\Controllers\DashboardController::class, 'getEvent']);
Route::get('my-jobs', [App\Http\Controllers\DashboardController::class, 'myJobs']);
Route::get('my-jobs/{id}', [App\Http\Controllers\DashboardController::class, 'lessonsByBatch']);

Route::delete('my-jobs/cancelled', [App\Http\Controllers\DashboardController::class, 'cancelledLesson']);
Route::delete('my-jobs/complete', [App\Http\Controllers\DashboardController::class, 'completeLesson']);

Route::post('toggel-attendance', [App\Http\Controllers\DashboardController::class, 'toggelAttendance']);
Route::get('classes', [App\Http\Controllers\DashboardController::class, 'classes']);
Route::get('classes/{id}', [App\Http\Controllers\DashboardController::class, 'classesByBatch']);

Route::get('my-jobs/{batch_id}/{lesson_id}', [App\Http\Controllers\DashboardController::class, 'lesson']);
# Admin routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'login'])->name('adminLogin');
    Route::post('login', [AdminLoginController::class, 'adminLogin']);
    Route::post('logout', [AdminLoginController::class, 'logout']);


    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('change-password', [DashboardController::class, 'changePassword']);
    Route::post('change-password', [DashboardController::class, 'postChangePassword']);


	Route::get('courses/get-courses', [CoursesController::class, 'getCourses']);
	Route::resource('courses', CoursesController::class);

	Route::get('demos/get-demos', [DemosController::class, 'getDemos']);
	Route::get('demos/{id}/show', [DemosController::class, 'show']);
	Route::resource('demos', DemosController::class);

	Route::get('teachers/get-teachers', [TeachersController::class, 'getTeachers']);
	Route::get('teachers/{id}/show', [TeachersController::class, 'show']);
	Route::resource('teachers', TeachersController::class);

	Route::get('parents/get-parents', [ParentsController::class, 'getParents']);
	Route::get('parents/{id}/show', [ParentsController::class, 'show']);
	Route::post('parents/add-student', [ParentsController::class, 'addStudent']);
	Route::get('parents/students/{id}', [ParentsController::class, 'calendar']);
	Route::get('parents/students/{id}/getEvent', [ParentsController::class, 'getEvent']);
	Route::get('assign-courses', [ParentsController::class, 'assignCourses']);
	Route::post('assign-courses', [ParentsController::class, 'postAssignCourses']);
	Route::resource('parents', ParentsController::class);



	Route::get('settings', [SettingController::class, 'index']);
	Route::post('settings', [SettingController::class, 'update']);
	
	// Route::get('content-management', 'ContentManagementController@index');
	// Route::post('content-management', 'ContentManagementController@update');
});

Route::get('{category}/{course}', [HomeController::class, 'courseDetail']);