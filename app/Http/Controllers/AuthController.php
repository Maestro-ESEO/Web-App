<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function show_login() {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function show_register() {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->validated();
        
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || $user->password != $credentials['password']) {
            return redirect(route('auth.login'))->withErrors([
                "email" => "The email or password is incorrect.",
            ])->onlyInput('email');
        }

        Auth::login($user);
        session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    public function register(RegisterRequest $request) {
        $credentials = $request->validated();

        if (User::where('email', $credentials['email'])->exists()) {
            return redirect(route('auth.register'))->withErrors([
                "email" => "The email is already taken.",
            ])->onlyInput('email');
        }
        $user = User::create([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);
        if ($user == null) {
            return redirect(route('auth.register'))->withErrors([
                'email' => "An error occurred while creating the user.",
            ])->onlyInput('email');
        }

        Auth::login($user);
        session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
