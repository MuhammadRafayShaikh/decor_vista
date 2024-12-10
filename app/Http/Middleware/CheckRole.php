<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->role == 'admin')
            {
                return $next($request);
            }
            else if(Auth::user()->role == 'designer')
            {
                return redirect('/designer/show')->with('status','Access Denied! as you are not as designer');
            }
        }
        else
        {
            return redirect('/')->with('status','Please Login First');
        }
    }
}