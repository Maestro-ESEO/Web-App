<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function show_login(): View {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function show_register(): View {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return to_route('auth.login')->withErrors([
                "email" => "L'adresse email ou le mot de passe est incorrect.",
            ])->onlyInput('email');
        }
        
        session()->regenerate();
        return redirect()->intended(route('dashboard'));
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
            'password' => $credentials['password'],
        ]);
        if ($user == null) {
            return to_route('auth.register')->withErrors([
                'email' => "Une erreur est survenue lors de l'inscription.",
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
