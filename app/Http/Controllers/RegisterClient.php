<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterClient extends Controller
{
    public function index()
    {
        return view('register.index');
    }
}
