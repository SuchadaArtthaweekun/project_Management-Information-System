<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Projects;

class DashHomeController extends Controller
{
    public function sum(string $users){
     
        $users = DB::table('users')->count();
        $cate = DB::table('categoreis')->count();
        $projects = DB::table('projects')->count();

        return view('dashboard', compact('users','cate','projects'));

    }
   
}