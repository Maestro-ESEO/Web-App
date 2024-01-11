<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function dashboard() {
        return view('app.dashboard');
    }

    public function profile() {
        return view('app.profile');
    }

}
