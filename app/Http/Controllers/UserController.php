<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller {

    public function show(): View {
        return view('app.profile');
    }

}
