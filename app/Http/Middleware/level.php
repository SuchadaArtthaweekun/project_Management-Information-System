<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);

        if(auth()->user()->level == 'นักศึกษา'){
            // return $next($request);
            return redirect('dashboard.std-dashboard');
        }
       
    }
}
