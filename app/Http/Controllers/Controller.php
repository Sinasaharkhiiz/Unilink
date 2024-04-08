<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Course;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rules\Exists;

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
       $u_data = User::find(Auth::id());
       $c_data = $u_data->courses()->paginate(4);
       return view('user-profile.profile' ,['u_data'=> $u_data , 'c_data'=>$c_data]);
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
   public function edit_profile()
   {
       $u_data = User::find(Auth::id());

       return view('user-profile.edit_user', ['u_data'=> $u_data]);
   }

   public function update_user(Request $request)
   {
    $user = User::find($request->input('user_id'));
    if($request->input('name')) $user->name = $request->input('u_name');
    if($request->input('role')) $user->role = $request->input('role');
    if($request->hasFile('avatar')){
    $users_avatar = $user->username.rand(100,1000).".png";
    $user->avatar=$request->file('avatar')->storeAs('users-avatar',$users_avatar , 'public');
    }
    $user->save();
    toast('تغییرات با موفقیت اعمال شد','success')->position('top');
    return redirect('edit_profile');
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
}
