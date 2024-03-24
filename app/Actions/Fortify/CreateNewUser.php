<?php

namespace App\Actions\Fortify;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'username'=>['required', 'string', Rule::unique(User::class)],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'username'=>$input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
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
