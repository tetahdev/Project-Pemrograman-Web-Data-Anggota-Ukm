<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        return $next($request);
    }
}
