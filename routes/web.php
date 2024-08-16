<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizResultController;

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
    Route::post('/quiz-results', [QuizResultController::class, 'store']);
    Route::get('/profile',[Controller::class, 'show_user_profile']);
    Route::get('/payment',[Controller::class, 'show_payment']);
    Route::get('/quiz',[Controller::class, 'show_quiz']);
    Route::get('/test',[Controller::class, 'show_test']);
    Route::get('/teach',[Controller::class, 'show_teach']);
    Route::get('/dashboard',[Controller::class, 'show_dashboard']);
    Route::post('/teach_req',[Controller::class, 'teach_req']);
    Route::post('/buy_course',[CourseController::class, 'buy_course']);
    Route::post('/course/{id}',[CourseController::class, 'add_comment']);
    Route::post('/rate/{id}',[CourseController::class, 'add_rate']);
    Route::get('/teacher',[Controller::class, 'show_teacher']);
    Route::get('/course',[CourseController::class, 'show_course']);
    Route::get('/edit_profile',[Controller::class, 'edit_profile']);
    Route::post('/update_user',[Controller::class , 'update_user']);
    Route::post('/update_profile',[Controller::class , 'update_profile']);
    Route::post('/update_user_contact',[Controller::class , 'update_user_contact']);
    Route::post('/delete_comment/{id}',[CourseController::class, 'delete_comment']);


    Route::middleware(['roleChecker:super_admin,null,null'])->group(function () {
    Route::get('/edit_course',[Controller::class, 'edit_courses']);
    Route::post('/edit_course',[Controller::class , 'edit_course']);
    Route::get('/edit_user',[Controller::class, 'edit_user']);
    Route::get('/accept_teach',[Controller::class, 'accept_teach']);
    Route::get('/adminpanel',[Controller::class, 'show_admin_panel']);
    Route::get('/users_management',[Controller::class, 'show_users_management']);
    Route::post('/delete_user/{id}',[Controller::class, 'delete_user']);
    Route::post('/delete_req/{id}',[Controller::class, 'delete_req']);
    Route::post('/delete_course/{id}',[CourseController::class, 'delete_course']);
    Route::get('/teach_management',[Controller::class, 'show_teach_management']);
    Route::get('/courses_management',[CourseController::class, 'show_courses_management']);
    });
    Route::middleware(['roleChecker:super_admin,admin,teacher'])->group(function () {
        Route::get('/add_course',[CourseController::class, 'show_add_course']);
        Route::post('/add_course',[CourseController::class, 'store']);
    });
});

