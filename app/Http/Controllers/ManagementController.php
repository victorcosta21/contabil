<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        return view('management.index');
    }

    public function create()
    {
        return view('management.create');
    }
}
