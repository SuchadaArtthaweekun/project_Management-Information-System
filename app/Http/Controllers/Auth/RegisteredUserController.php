<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:12',],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_tel' => ['required', 'string', 'max:10'],
            
        ]);

        $user = User::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'email' => $request->email,
            'username' => $request->username,
            'level' => $request->level,
            'password' => Hash::make($request->password),
            'user_tel' => $request->user_tel,
            'status' => '0',
            
        ]);

        event(new Registered($user));

        // echo 'finished';

        // Auth::login($user);

        // return response()->json(['message' => 'success']);
        // return redirect('/register');
        // return redirect()->back()->with('success');
        // return redirect('/')->with('success','File has been upload successfully!');

        return redirect()->back()
                ->with('success', 'สร้างบัญชีแล้ว รอการอนุมัติ');
    }
}
