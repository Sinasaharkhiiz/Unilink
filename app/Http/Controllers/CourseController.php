<?php

namespace App\Http\Controllers;

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
        $course_cover = $req->input('name').rand(100,1000).".png";
        $course->price=$req->input('price');
        $course->name=$req->input('name');
        $course->content=$req->file('content')->storeAs('courses',$fileName , 'public');
        $course->content=$req->file('cover')->storeAs('courses_cover',$fileName , 'public');
        $course->description = $req->input('description');
        $course->date= now()->format('Y-m-d');
        $course->publisher_id = Auth::user()->id;
        $course->save();
        return redirect('courses');
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
}
