<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function signin(Request $request)
    {
        return view('signin');
    }

    public function signup(Request $request)
    {
        return view('signup');
    }
}
