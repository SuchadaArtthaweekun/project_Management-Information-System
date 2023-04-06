<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function allUser()
    {
        $users = DB::table('users')->get();
        return view('users.alluser', ['users' => $users]);
    }

    public function dashboard()
    {
        $users = DB::table('users')->get();
        return view('layouts.fordashboard', compact('users'));
    }


    public function addUserForm()
    {
        return view('users.addUserForm');
    }
    public function addUser(Request $request)
    {
        $name = $request->input('name');
        $name_en = $request->input('name_en');
        $email = $request->input('email');
        $level = $request->input('level');
        $password = Hash::make($request->password);
        $user_tel = $request->input('user_tel');
        $status = $request->input('status');
        $username = $request->input('username');

        $data = array(
            'name' => $name, 'name_en' => $name_en, 'email' => $email, 'level' => $level, 'password' => $password,
            'user_tel' => $user_tel, 'username' => $username, 'status' => $status
        );
        DB::table('users')->insert($data);

        return redirect()->route('alluser');
    }

    public function deleteUser($id)
    {
        $users = User::find($id)->delete();

        // DB::table('users')->where('id')->delete();
        // return redirect('alluser');
        return response()->json(['message' => 'deleted']);
    }

    public function updateuser(Request $request)
    {
        $name = $request->name;
        $name_en = $request->name_en;
        $email = $request->email;
        $level = $request->level;
        $user_tel = $request->user_tel;
        $username = $request->note;
        $status = $request->status;
        $users = User::find($request->id);
        $users->name = $name;
        $users->name_en = $name_en;
        $users->email = $email;
        $users->level = $level;
        $users->user_tel = $user_tel;
        $users->username = $username;
        $users->status = $status;
        $users->save();
        // if (Auth::user()->level == 'ผู้ดูแล') {
        //     return redirect('alluser');
        // }else if(Auth::user()->level == 'นักศึกษา'){
        //     return redirect('stddashboard');
        // }else if(Auth::user()->level == 'อาจารย์'){
        //     return redirect('tchDashUser');
        // }
            // echo $users;
        return redirect()->back(); 
        
    }

    public function updateuserself(Request $request)
    {
        $name = $request->name;
        $name_en = $request->name_en;
        $email = $request->email;
        $user_tel = $request->user_tel;

        $users = User::find($request->id);
        $users->name = $name;
        $users->name_en = $name_en;
        $users->email = $email;
        $users->user_tel = $user_tel;
        $users->save();
            // echo $users;
        return redirect()->back(); 
    }
    public function edituser($id)
    {
        $user = User::find($id);
        if(Auth::user()->level == 'นักศึกษา'){
            return view('dashboard.std-edituser', compact('user'));
        }else if(Auth::user()->level == 'อาจารย์'){
            return view('dashboard.tch-edituser', compact('user'));
        }
        
    }

    public function edituserself($id)
    {
        $user = User::find($id);
            return view('dashboard.std-edituser', compact('user'));
    }
    

    public function updateFormUser($id)
    {
        $users = User::find($id);
        return view('users.alluser', compact('users'));
    }

    public function pendingUser()
    {
        if (DB::table('users')->where('status', '=', '0')) {
            $data = DB::table('users')
                ->where('status', '=', '0')
                ->get();

            return view('users.pending', compact('data'));
        } else {
            return view('dashboard')->with("don't have");
        }
    }
    public function approveUser(Request $request, $id)
    {
        // $data = User::find($request->id);
        $data = DB::table('users')->where('id','=', $id)
            ->update(['status' => 1]);
        // return view('users.pending', compact('data'));
        return redirect()->back(); 
    }
    public function dashuser()
    {
        $users = DB::table('users')->get();
        return view('users.dashuser', compact('users'));
    }

    
    public function stddashboard()
    {
        $id =  Auth::user()->id;
        $users = DB::table('users')->where('users.id', '=', '$id');
        $advisers = DB::table('advisers')->get();
        $categories = DB::table('categories')->get();
        $projects = DB::table('categories')->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->where('projects.id','=',Auth::user()->id)
            ->get();
        return view('dashboard.std-dashboard', compact('users','advisers','categories','projects'));
    }
    public function tchdashboard()
    {
        // $id =  Auth::user()->id;
        $users = DB::table('users')->where('users.id', '=', '$id');
        // $user = User::find('id');
        $projects = DB::table('categories')
            ->join('projects', 'projects.cate_id', '=', 'categories.cate_id')
            ->join('advisers', 'advisers.adviser_id', '=', 'projects.adviser')
            ->where('projects.id', '=', Auth()->user()->id)
            ->get();
        $categories = DB::table('categories')->get();
        $advisers = DB::table('advisers')->get();
        return view('dashboard.tch-dashboard', compact('users','advisers','categories','projects'));
    }
    public function tchDashUser()
    {
        $users = DB::table('users')->get();
        return view('dashboard.tch-dashboard', compact('users'));
    }


    public function tchEditUser($id)
    {
        $user = User::find($id);
        return view('dashboard.tch-edituser', compact('user'));
    }
    public function stdEditUser($id)
    {
        $user = User::find($id);
        return view('dashboard.std-edituser', compact('user'));
    }
    public function adEditUser($id)
    {
        $user = User::find($id);
        return view('users.edituser', compact('user'));
    }

}
