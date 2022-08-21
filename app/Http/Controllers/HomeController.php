<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function firstRegister()
    {
        return view('firstRegister');
    }

    public function index()
    {
        return view('home');
    }

    public function dashboard2()
    {
        return view('dashboard2');
    }
}
