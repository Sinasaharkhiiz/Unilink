<?php

use App\Models\User;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\CreateNewUser;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/home',[Controller::class, 'show_home']);
Route::get('logout',[Controller::class, 'show_logout']);
Route::get('/courses',[CourseController::class, 'show_courses']);

Route::middleware('auth')->group(function () {
    Route::get('/profile',[CreateNewUser::class, 'show_user_profile']);
    Route::get('/dashboard',[Controller::class, 'show_dashboard']);
    Route::get('/add_course',[CourseController::class, 'show_add_course']);
    Route::post('/add_course',[CourseController::class, 'store']);
    Route::post('/course/{id}',[CourseController::class, 'add_comment']);
    Route::get('/course',[CourseController::class, 'show_course']);
    Route::middleware(['roleChecker:super_admin,null,null'])->group(function () {
        Route::get('/adminpanel',[CreateNewUser::class, 'show_admin_panel']);
        Route::get('/users_management',[CreateNewUser::class, 'show_users_management']);
        Route::post('/delete_user/{id}',[CreateNewUser::class, 'delete_user']);
        Route::get('/courses_management',[CourseController::class, 'show_courses_management']);
    });
});
