<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function firstRegister()
    {
        return view('firstRegister');
    }

    public function index()
    { 
        $projects = DB::table('projects')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->get();
        $documents = DB::table('documents')->get();
        $categories = DB::table('categories')->get();
        $advisers = DB::table('advisers')->get();
        $projects = DB::table('projects')->get();
        $documents = DB::table('documents')->get();
        return view('home', compact('projects', 'documents', 'categories', 'advisers'));
    }

    public function dashboard2()
    {
        return view('dashboard2');
    }

    public function dashsearch()
    {

       
        return view('home', compact('projects', 'documents', 'categories', 'advisers', 'adviser'));
    }

   
}
