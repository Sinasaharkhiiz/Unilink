<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
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
   public function show_logout()
   {
       auth()->logout();
       Session()->flush();
       return view('home');
   }
   public function show_user_profile()
   {
       return view('user-profile.profile');
   }
   public function show_admin_panel()
   {
       $user_count = User::all()->count();
       $course_count = Course::all()->count();
       return view('user-profile.adminPanel' , ['user_count'=> $user_count , 'course_count'=> $course_count]);

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
}
