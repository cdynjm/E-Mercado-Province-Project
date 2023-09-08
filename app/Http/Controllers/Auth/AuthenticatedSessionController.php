<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Admin;
use App\Models\User;

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

    public function modallogin(Request $request){
        $username = $request->username;
        $password = $request->password;

        if (empty($username))
            return response()->json(['Error' => 1, 'Message' => 'Empty Username']);

        if (empty($password))
            return response()->json(['Error' => 1, 'Message' => 'Empty Password']);
        
        $credentials = ['username' => $username, 'password' => $password, 'user_type' => "buyer"];
 
        if (Auth::attempt($credentials)) {
            return response()->json(['Error' => 0]);
        }

        return response()->json(['Error' => 1, 'Message' => 'Invalid Username or Password']);
    
    }
    
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $obj = new AuthenticatedSessionController;

        if(Auth::user()->user_type == 'provincial' || Auth::user()->user_type == 'municipal') { 

            $request->session()->put('admin', Admin::where(['account_id' => Auth::user()->account_id])->get());

        }

        return redirect(RouteServiceProvider::HOME);
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
}
