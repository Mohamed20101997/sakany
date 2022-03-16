<?php

namespace App\Http\Middleware;

use Closure;

class guestfront
{

    public function handle($request, Closure $next)
    {
        if( \Auth::guard('user')->check() || \Auth::guard('owner')->check() ){
            return redirect()->intended('/');
        }
        return $next($request);

    }
}
