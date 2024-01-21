<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Utils\AuthUtil;

class UserController extends Controller {

    public function show() {
        return view('app.profile');
    }

    public function edit() {
        return view('app.profile-edit');
    }

    public function update(UpdateProfileRequest $request) {
        $credentials = $request->validated();
        
        $user = AuthUtil::getAuthUser();
        if ($user->email != $credentials['email'] && User::where('email', $credentials['email'])->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email already taken']);
        }

        $user->first_name = $credentials['first_name'];
        $user->last_name = $credentials['last_name'];
        $user->email = $credentials['email'];
        $user->password = $credentials['password'];
        $user->profile_photo_path = $credentials['image_url'];

        $user->save();

        return redirect()->route('profile');
    }

}
