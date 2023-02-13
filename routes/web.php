<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CoursesController;

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
Route::get('book-demo', [HomeController::class, 'book_demo']);
Route::get('champcam', [HomeController::class, 'champcam']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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


	Route::get('settings', [SettingController::class, 'index']);
	Route::post('settings', [SettingController::class, 'update']);
	
	// Route::get('content-management', 'ContentManagementController@index');
	// Route::post('content-management', 'ContentManagementController@update');
});
