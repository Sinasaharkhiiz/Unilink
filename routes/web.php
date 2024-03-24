<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return view('home');
});
Route::get('/home',[Controller::class, 'show_home']);
Route::get('logout',[Controller::class, 'show_logout']);
Route::get('/courses',[CourseController::class, 'show_courses']);


Route::middleware('auth')->group(function () {
    Route::get('/profile',[Controller::class, 'show_user_profile']);
    Route::get('/dashboard',[Controller::class, 'show_dashboard']);
    Route::get('/add_course',[CourseController::class, 'show_add_course']);
    Route::post('/add_course',[CourseController::class, 'store']);
    Route::post('/buy_course',[CourseController::class, 'buy_course']);
    Route::post('/course/{id}',[CourseController::class, 'add_comment']);
    Route::get('/teacher',[Controller::class, 'show_teacher']);
    Route::get('/course',[CourseController::class, 'show_course']);
    Route::post('/delete_comment/{id}',[CourseController::class, 'delete_comment']);
    Route::middleware(['roleChecker:super_admin,null,null'])->group(function () {
    Route::get('/edit_user',[Controller::class, 'edit_user']);
    Route::get('/adminpanel',[Controller::class, 'show_admin_panel']);
    Route::get('/users_management',[Controller::class, 'show_users_management']);
    Route::post('/delete_user/{id}',[Controller::class, 'delete_user']);
    Route::post('/delete_course/{id}',[CourseController::class, 'delete_course']);
    Route::get('/courses_management',[CourseController::class, 'show_courses_management']);
    });
});

