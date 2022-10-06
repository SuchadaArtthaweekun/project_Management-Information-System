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
        $note = $request->input('note');

        $data = array(
            'name' => $name, 'name_en' => $name_en, 'email' => $email, 'level' => $level, 'password' => $password,
            'user_tel' => $user_tel, 'note' => $note, 'status' => $status
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
        $password = $request->password;
        $level = $request->level;
        $user_tel = $request->user_tel;
        $note = $request->note;
        $status = $request->status;
        $users = User::find($request->id);
        $users->name = $name;
        $users->name_en = $name_en;
        $users->email = $email;
        $users->password = $password;
        $users->level = $level;
        $users->user_tel = $user_tel;
        $users->note = $note;
        $users->status = $status;
        $users->save();
        if (Auth::user()->level == 'ผู้ดูแล') {
            return redirect('alluser');
        }else if(Auth::user()->level == 'นักศึกษา'){
            return redirect('stddashboard');
        }else if(Auth::user()->level == 'อาจารย์'){
            return redirect('tchDashUser');
        }
        
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
    public function approveUser(Request $request)
    {
        // $data = User::find($request->id);
        $data = DB::table('users')
            ->update(['status' => 1]);
        return view('users.pending', compact('data'));
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

        // echo $id;
        return view('dashboard.std-dashboard', compact('users'));
    }
    public function tchdashboard()
    {
        $users = DB::table('users')->get();
        return view('dashboard.tch-dashboard', compact('users'));
    }
    public function tchDashUser()
    {
        $users = DB::table('users')->get();
        return view('dashboard.tch-dashboard', compact('users'));
    }
}
