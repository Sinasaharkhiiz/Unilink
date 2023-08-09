<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $course = new Course;
        $fileName = $req->input('name').rand(100,1000).".pdf";
        $course->price=$req->input('price');
        $course->name=$req->input('name');
        $course->content=$req->file('content')->storeAs('courses',$fileName , 'public');
        if($req->hasFile('cover')){
            $course_cover = $req->input('name').rand(100,1000).".png";
            $course->content=$req->file('cover')->storeAs('courses_cover',$fileName , 'public');
        }
        $course->description = $req->input('description');
        $course->date= now()->format('Y-m-d');
        $course->publisher_id = Auth::user()->id;
        $course->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
    public function show_add_course()
    {
        return view('course.add_course');
    }

    public function show_courses()
    {
        if (request('search')) {
            $c_data = Course::where('name', 'like', '%' . request('search') . '%')->paginate(9);
        } else {
            $c_data = Course::paginate(9);
        }
        return view('course.courses', ['c_data'=> $c_data]);
    }

    public function show_course()
    {
        $c_data = Course::find($_GET['id']);
        $p_data = User::find($c_data->publisher_id);
        return view('course.course', ['c_data'=> $c_data,'p_data'=>$p_data]);
    }
}
