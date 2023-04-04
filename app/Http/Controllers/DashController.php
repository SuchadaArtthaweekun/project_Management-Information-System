<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    public function sum(){
     
        $users = DB::table('users')->count();
        $cate = DB::table('categories')->count();
        $countprojects = DB::table('projects')->where('published','=','1')->count();
        $countUnprojects = DB::table('projects')->where('published','=','0')->count();

        $userAdmin = DB::table('users')->where('level','=','ผู้ดูแลระบบ')->where('status','=',1)->get();
        $coutAllUser = DB::table('users')->where('status','=',1)->count();
        $coutAdmin = DB::table('users')->where('level','=','ผู้ดูแลระบบ')->where('status','=',1)->count();
        $coutTch = DB::table('users')->where('level','=','อาจารย์')->where('status','=',1)->count();
        $coutStd = DB::table('users')->where('level','=','นักศึกษา')->where('status','=',1)->count();

        $coutUnMember = DB::table('users')->where('status','=',0)->count();
        $coutUnTch = DB::table('users')->where('level','=','อาจารย์')->where('status','=',0)->count();
        $coutUnStd = DB::table('users')->where('level','=','นักศึกษา')->where('status','=',0)->count();


        return view('dashboard', compact('users','cate','countprojects','coutAllUser','cate','coutUnMember','countUnprojects'));

    }

    public function eachDash(){
        $advisers = DB::table('advisers');
        if (auth()->user()->level == 'ผู้ดูแลระบบ') {
            return redirect()->route('dashboard');
        } else if (auth()->user()->level == 'อาจารย์') {
            return redirect()->route('tchdashboard');
        } else if (auth()->user()->level == 'นักศึกษา') {
            return redirect()->route('stddashboard');
        }
        
    }

    public function loginDash(){
        if (auth()->user()->level == 'ผู้ดูแลระบบ') {
            return redirect()->route('dashboard');
        } else if (auth()->user()->level == 'อาจารย์') {
            return redirect()->route('tchdashboard');
        } else if (auth()->user()->level == 'นักศึกษา') {
            return redirect()->route('stddashboard');
        }
        
    }
}
