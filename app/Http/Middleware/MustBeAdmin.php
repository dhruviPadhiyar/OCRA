<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {       
        // $username = Auth::user()->name;
        // dd(Auth::user()->name);
        // $username= Auth::user()->name;

        // if($username != "admin") {
            // abort(403);
        // }
// 
        return $next($request);
    }
}
