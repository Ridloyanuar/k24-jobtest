<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_admin == 0 || auth()->user()->is_admin == null) {
            return $next($request);
        }

        return redirect('home')->with('error', "Hanya Untuk Member");
    }
}
