<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_view() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function register_view() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->intended(route('home'));
        }
        return to_route('auth.login')->withErrors([
            "email" => "L'adresse email ou le mot de passe est incorrect.",
        ])->onlyInput('email');
    }

    public function register(RegisterRequest $request) {
        $credentials = $request->validated();

        if (User::where('email', $credentials['email'])->exists()) {
            return to_route('auth.register')->withErrors([
                "email" => "L'adresse email est déjà utilisée.",
            ])->onlyInput('email');
        }
        $user = User::create([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);
        if ($user == null) {
            return to_route('auth.register')->withErrors([
                'email' => "Une erreur est survenue lors de l'inscription.",
            ])->onlyInput('email');
        }
        Auth::login($user);
        session()->regenerate();
        return redirect()->route('home');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
