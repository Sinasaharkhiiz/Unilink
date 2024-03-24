<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
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
            $course->cover=$req->file('cover')->storeAs('courses_cover',$course_cover , 'public');
        }
        $course->description = $req->input('description');
        $course->publisher_id = Auth::user()->id;
        $course->save();
        alert()->success('جزوه با موفقیت ثبت شد ','با تشکر .');
        return redirect('courses');
    }
    public function add_comment(Request $req)
    {
        $comment = new Comment;
        $comment->sender_id = Auth::user()->id;
        $comment->course_id = $req->input('c_id');
        $comment->comment=$req->input('comment');
        $comment->save();
        toast('نظر شما با موفقیت ثبت شد','success')->position('top');
        return redirect('course/'.'?id='.$req->input('c_id'));
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
        $c_order = "";
        if (request('search')) {
            $c_data = Course::where('name', 'like', '%' . request('search') . '%')->paginate(9);
        } elseif(request('order')) {
            if(request()->order=="newest"){
            $c_data = Course::orderBy('created_at', 'DESC')->paginate(9);
            $c_order = "(جدبد ترین)";
            }elseif(request()->order=="cheapest"){
            $c_data = Course::orderBy('price')->paginate(9);
            $c_order = "(ارزان ترین)";
            }else{
                $c_data = Course::orderBy('created_at', 'DESC')->paginate(9);
                $c_order = "(جدید ترین)";
            }
        }else{
            $c_data = Course::orderBy('created_at', 'DESC')->paginate(9);
        }
        return view('course.courses', ['c_data'=> $c_data, 'c_order'=>$c_order]);
    }

    public function show_course()
    {
        $c_data = Course::find($_GET['id']);
        $p_data = User::find($c_data->publisher_id);
        $student = DB::table('course_user')->where('user_id',Auth::user()->id)->where('course_id',$_GET['id'])->get();
        if(!$student->toArray()){
                    //user is not found
                    $Check_student=0;
             }
             if($student->toArray()){
                    // user found
                    $Check_student=1;
             }
        $co_data = Comment::where('course_id', '=' , $_GET['id'])->orderBy('comments.created_at', 'DESC')->paginate(3);
        return view('course.course', ['c_data'=> $c_data,'p_data'=>$p_data , 'co_data'=>$co_data ,'Check_student'=>$Check_student]);
    }

    public function buy_course(Request $req)
    {
        $course = Course::find($req->input('c_id'));
        $user= User::find(Auth::user()->id);
        $student = DB::table('course_user')->where('user_id',Auth::user()->id)->where('course_id',$req->input('c_id'))->get();
        if(!$student->toArray()){
                    //user is not found
                    $user->courses()->save($course);
                    toast('جزوه با موفقیت خریداری شد','success')->position('top');
             }
             if($student->toArray()){
                    // user found
                    toast('شما قبلا این جزوه ررا خریداری کرده اید!','warning')->position('top');
             }
        return view('home');
    }

    public function show_courses_management()
    {


        if (request('search')) {
            $all_courses = Course::where('name', 'like', '%' . request('search') . '%')->orWhere('id', 'like', '%' . request('search') . '%')->paginate(9);
        } else {
            $all_courses = Course::paginate(9);
        }
        return view('course.courses_management', ['all_courses'=> $all_courses]);

    }
    public function delete_comment(Request $req)
    {
        Comment::where('id',$req->input('com_id'))->delete();
        toast('نظر با موفقیت حذف شد','success')->position('top');
        return redirect('course?id='.$req->Input('cou_id').'#comments');
    }
    public function delete_course(Request $req)
    {
        Course::where('id',$req->input('course_id'))->delete();
        toast('جزوه با موفقیت حذف شد','success')->position('top');
        return redirect('courses_management');
    }
}
