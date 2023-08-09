<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
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
}
