<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        if (auth()->user()->status == '0') {
            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with('info', 'รอการอนุมัติสิทธิ์');
        } else if (auth()->user()->status == '1') {
            if (auth()->user()->level == 'ผู้ดูแลระบบ') {
                return redirect()->route('dashboard');
            } else if (auth()->user()->level == 'อาจารย์') {
                return redirect()->route('tchdashboard');
            } else if (auth()->user()->level == 'นักศึกษา') {
                return redirect()->route('stddashboard');
            }
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required|username',
            'password' => 'required|password'
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->level = 'ผู้ดูแลระบบ') {
                return redirect()->route('dashuser');
            } else if ((auth()->user()->level = 'อาจารย์')) {
                return redirect()->route('dashuser');
            } else if ((auth()->user()->level = 'นักศึกษา')) {
                return redirect()->route('dashuser');
            }
        }
    }
}
