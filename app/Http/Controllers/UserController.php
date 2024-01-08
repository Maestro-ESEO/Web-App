<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function print()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect()->route('login');
        }
        return view('profile', [
            'user' => $user
        ]);
    }

    public function home() {
        return view('home', [
            'user' => Auth::user()
        ]);
    }

    public function dashboard() {
        return view('dashboard.dashboard', [
            'user' => Auth::user()
        ]);
    }

}
