<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index(): string
    {
        return view('auth/content/login');
    }

    public function register(): string
    {
        return view('auth/content/register');
    }
}
