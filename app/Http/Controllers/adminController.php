<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    function index()
    {
        return view('layouts/admin');
    }
    function user()
    {
        return view('layouts/admin');
    }
}
