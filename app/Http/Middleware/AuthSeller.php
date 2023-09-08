<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthSeller
{
   
    public function handle(Request $request, Closure $next)
    {

        if (strtolower(Auth::user()->user_type) != "seller"){
            return redirect('/');
        }

        return $next($request);
    }
}
