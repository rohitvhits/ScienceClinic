<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        if(auth()->guard('web')->check()){
            return redirect('tutor-account');
        }
        return view('auth.login');
    }
}
