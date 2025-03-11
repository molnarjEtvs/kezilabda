<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //tipus az az oszlop neve a users táblában, ha más a név akkor itt is más
        if(!Auth::check() || (Auth::user()->tipus !== "admin")){
            abort(403,"Hozzáférés megtagadva");
        }else{
            return $next($request);
        }
    }
}
