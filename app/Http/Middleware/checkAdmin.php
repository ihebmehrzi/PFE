<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (!Auth::user()->user_role == "admin") {

        //     return redirect()->route('admin');

        // }

        return $next($request);
    }
}
