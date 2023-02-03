<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminLoginController;

use App\Http\Controllers\HomeController;
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

//Admin Routes
	Route::prefix('admin')->group(function () {
	    	Route::get('login', [AdminLoginController::class,'login'])->name('adminLogin');
			Route::post('login', [AdminLoginController::class,'adminLogin']);

			Route::group(['middleware' => 'auth:admin'], function () {
				Route::post('logout', [AdminLoginController::class,'logout']);
	    	});
	});
//End Admin routes

Route::get('/', [HomeController::class, 'home']);
Route::get('about', [HomeController::class, 'about']);
Route::get('courses', [HomeController::class, 'courses']);
Route::get('price', [HomeController::class, 'price']);
Route::get('contact', [HomeController::class, 'contact']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
