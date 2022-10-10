<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterClient extends Controller
{
    public function index()
    {
        $count = 1;
        // echo '<pre>';print_r($count);exit;

        return view('register.index', compact('count'));
    }
}
