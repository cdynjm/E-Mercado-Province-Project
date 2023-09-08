<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthAdmin
{
   
    public function handle(Request $request, Closure $next)
    {

        if (strtolower(Auth::user()->user_type) != "municipal" && strtolower(Auth::user()->user_type) != "provincial"){
            return redirect('/');
        }

        return $next($request);
    }
}
