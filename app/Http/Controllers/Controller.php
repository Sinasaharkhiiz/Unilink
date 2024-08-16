<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Teach;
use App\Models\Course;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
   // use AuthorizesRequests, ValidatesRequests;
   public function show_dashboard()
   {
       return view('dashboard');
   }

   public function show_home()
   {
       return view('home');
   }
   public function show_payment(Request $req)
   {
        $c_data = Course::find($req->input('c_id'));
        return view('layouts.pardakht',['c_data'=> $c_data]);
   }
   public function show_logout()
   {
       auth()->logout();
       Session()->flush();
       return view('home');
   }
   public function show_user_profile()
   {
       $u_data = User::find(Auth::id());
       $c_data = $u_data->courses()->paginate(4);
       return view('user-profile.profile' ,['u_data'=> $u_data , 'c_data'=>$c_data]);
   }
   public function show_admin_panel()
   {
       $user_count = User::all()->count();
       $teach_count = Teach::where('level','=',3)->count();
       $course_count = Course::all()->count();
       return view('user-profile.adminPanel' , ['user_count'=> $user_count , 'course_count'=> $course_count , 'teach_count'=>$teach_count]);

   }
   public function show_users_management()
   {
       if (request('search')) {
           $all_users = User::where('username', 'like', '%' . request('search') . '%')->orWhere('name', 'like', '%' . request('search') . '%')->paginate(9);
       } else {
           $all_users = User::paginate(9);
       }
       return view('user-profile.users_management', ['all_users'=> $all_users]);
   }

   public function show_teacher()
   {
    $u_data = User::find($_GET['id']);
    $c_data = Course::where('publisher_id','=',$_GET['id'])->paginate(4);

       return view('user-profile.teacher', ['u_data'=> $u_data , 'c_data'=>$c_data]);
   }

   public function delete_user(Request $req)
   {
       User::where('id',$req->input('user_id'))->delete();
       toast('کاربر با موفقیت حذف شد','success')->position('top');
       return redirect('users_management');
   }

   public function edit_user()
   {
       $u_data = User::find($_GET['id']);

       return view('user-profile.edit_user', ['u_data'=> $u_data]);
   }
   public function edit_courses()
   {
       $c_data = Course::find($_GET['id']);

       return view('course.edit_course', ['c_data'=> $c_data]);
   }
   public function edit_profile()
   {
       $u_data = User::find(Auth::id());

       return view('user-profile.edit_user', ['u_data'=> $u_data]);
   }

   public function update_user(Request $request)
   {
    $user = User::find($request->input('user_id'));
    if($request->input('u_name')) $user->name = $request->input('u_name');
    if($request->input('role')) $user->role = $request->input('role');
    if($request->hasFile('avatar')){
    $users_avatar = $user->username.".png";
    $user->avatar=$request->file('avatar')->storeAs('users-avatar',$users_avatar , 'public');
    }
    $user->save();
    toast('تغییرات با موفقیت اعمال شد','success')->position('top');
    return redirect('edit_profile');
   }
   public function edit_course(Request $request)
   {
    $course = Course::find($request->input('course_id'));
    if($request->input('name')) $course->name = $request->input('name');
    if($request->input('price')) $course->price = $request->input('price');
    if($request->input('description')) $course->description = $request->input('description');
    if($request->hasFile('content')){
    $course_content = $course->content.".png";
    $course->content=$request->file('content')->storeAs('courses',$course_content , 'public');
    }
    if($request->hasFile('cover')){
        $course_cover = $course->cover.".png";
        $course->cover=$request->file('cover')->storeAs('courses_cover',$course_cover , 'public');
        }
    $course->save();
    toast('تغییرات با موفقیت اعمال شد','success')->position('top');
    return redirect('courses_management');
   }
   public function Update_profile(Request $request)
   {
    $user = User::find($request->input('user_id'));
    if (Profile::where('user_id', '=', $user->id)->exists()) {
        Profile::where('user_id',$user->id)->update([
            'user_id'=>$request->input('user_id'),
            'job' => $request->input('job'),
            'state' => $request->input('state'),
            'about' => $request->input('about'),
    ]);
    }else{
        $profile = new Profile;
        $profile->user_id=$request->input('user_id');
        if($request->input('job')) $profile->job = $request->input('job');
        if($request->input('state')) $profile->state = $request->input('state');
        if($request->input('about')) $profile->about = $request->input('about');
        $user->profile()->save($profile);
    }
    toast('تغییرات با موفقیت اعمال شد','success')->position('top');
    return redirect('edit_profile');
   }
   public function update_user_contact(Request $request)
   {
    $user = User::find($request->input('user_id'));
    if (Profile::where('user_id', '=', $user->id)->exists()) {
        Profile::where('user_id',$user->id)->update([
            'website'=>$request->input('website'),
            'github' => $request->input('github'),
            'linkedin' => $request->input('linkedin'),
            'telegram' => $request->input('telegram'),
            'instagram' => $request->input('instagram'),
            'twitter' => $request->input('x'),
    ]);
    }else{
        $profile = new Profile;
        $profile->website=$request->input('website');
        $profile->github=$request->input('github');
        $profile->linkedin=$request->input('linkedin');
        $profile->telegram=$request->input('telegram');
        $profile->instagram=$request->input('instagram');
        $profile->twitter=$request->input('twitter');
        $user->profile()->save($profile);
    }
    toast('تغییرات با موفقیت اعمال شد','success')->position('top');
    return redirect('edit_profile');
   }

   public function show_quiz(){
    $u_data = User::find(Auth::id());
    return view('quiz.quiz',['u_data'=> $u_data]);
   }
   public function show_test(){

    return view('quiz.test');
   }

   public function show_teach(){
    $user = User::find(Auth::id());
    $tech = $user->teach();
    return view('user-profile.teach',['tech'=> $user]);
   }
   public function show_teach_management(){

    if (request('search')) {
       $all_users = Teach::where('level','=',3)->where('name', 'like', '%' . request('search') . '%')->orWhere('id', 'like', '%' . request('search') . '%')->paginate(9);
    } else {
       $all_users = Teach::where('level','=',3)->paginate(9);
    }
    return view('user-profile.teach_management', ['all_users'=> $all_users]);
   }

   public function teach_req(Request $req){
    $user = User::find(Auth::id());
    if($user->teach!=null){
        if($user->teach->level==3){
        toast('شما قبلا درخوسات داده اید !','warning')->position('top');
        return redirect('teach');
        }elseif($user->teach->level==4){
            $tech = Teach::find($user->teach->id);
            $tech->level=3;
            $tech->save();
            return redirect('teach');
        }elseif($user->teach->level==5){
            toast('شما هم اکنون میتوانید تدریس کنید. با درخواست شما قبلا موافقت شده است !','warning')->position('top');
            return redirect('teach');
        }
    }elseif($user->role!='student'){
        toast('شما هم اکنون میتوانید تدریس کنید. با درخواست شما قبلا موافقت شده است !','warning')->position('top');
        return redirect('teach');
    }else{
        $teach = new Teach;
        $teach->user_id = $req->input('u_id');
        $teach->save();
        toast('درخواست شما با موفقیت ثبت شد','success')->position('top');
        return redirect('teach');
    }
   }

   public function delete_req(Request $req)
   {
       $tech=Teach::find($req->input('req_id'));
       $tech->text = $req->input('message-text');
       $tech->level=4;
       $tech->save();
       toast('با درخوسات مخالفت شد','success')->position('top');
       return redirect('teach_management');
   }
   public function accept_teach(){
        $teach = Teach::find($_GET['id']);
        $user = User::find($teach->user_id);
        $user->role= 'teacher';
        $user->save();
        $teach->level = 5;
        $teach->text='درخوسات با موفقیت پذیرفته شد';
        $teach->status = 1;
        $teach->save();
        toast('موافقت با درخواست ، با موفقیت ثبت شد','success')->position('top');
        return redirect('teach_management');
   }
}
