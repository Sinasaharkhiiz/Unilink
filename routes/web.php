<?php

use App\Models\Course;
use Illuminate\Support\Facades\Route;
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
Route::get('/home', function () {
    return view('home');
});
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return view('home');
})->name('logout');
Route::get('/courses', function () {
    $c_data = Course::paginate(9);
    return view('course.courses', ['c_data'=> $c_data]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('user-profile.profile');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/add_course', function () {
        return view('course.add_course');
    });
    Route::post('/add_course',[CourseController::class, 'store']);
   
});
