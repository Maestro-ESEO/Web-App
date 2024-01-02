<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthUtil {

    public static function getAuthUser() : User {
        /** @var User $user */
        $user = Auth::user();
        return $user;
    }

}