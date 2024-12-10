<?php

namespace App\Http\Middleware;

use App\Models\Designer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DesignerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role != "designer") {
            return redirect('/');
        } else {
            if (!Session::has('designer_id') && Auth::check()) {
                $checkDesigner = Designer::where('user_id', Auth::id())->first();
                if ($checkDesigner) {
                    Session::put('designer_id', $checkDesigner->id);
                }
            }
            return $next($request);
        }
    }
}
