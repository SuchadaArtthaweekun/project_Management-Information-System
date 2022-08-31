<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function allUser() {
        $users = DB::table('users')->get();
        return view('users.alluser', ['users' => $users]);
    }

    public function addUserForm(){
        return view('users.addUserForm');
    }
    public function addUser(Request $request) {
        $name = $request->input('name');
        $name_en = $request->input('name_en');
        $email = $request->input('email');
        $level = $request->input('level');
        $password = $request->input('password');
        $user_tel = $request->input('user_tel');
        $status = $request->input('status');
        $note = $request->input('note');
        $generation = $request->input('generation');
        $data=array('name'=>$name, 'name_en'=>$name_en, 'email'=>$email, 'level'=>$level, 'password'=>$password, 
        'user_tel'=>$user_tel, 'note'=>$note,'generation'=>$generation, 'status'=>$status );
        DB::table('users')->insert($data);

        return redirect()->route('alluser');
 
    }

    public function deleteUser($id) {
        $users = User::find($id)->delete();
        
        // DB::table('users')->where('id')->delete();
        return redirect('users.alluser');
       
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
        $generation = $request->generation;
        $status = $request->status;
        $users = User::find($request->id);
        $users-> name = $name;
        $users-> name_en = $name_en;
        $users-> email = $email;
        $users-> password = $password;
        $users-> level = $level;
        $users-> user_tel = $user_tel;
        $users-> note = $note;
        $users-> generation = $generation;
        $users-> status = $status;
        $users->save();
        return redirect('alluser');

    }

    public function updateFormUser($id)
    {
        $users = User::find($id);
        return view('users.alluser',compact('users'));

    }
    
    
}
