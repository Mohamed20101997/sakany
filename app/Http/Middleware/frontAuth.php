<?php

namespace App\Http\Middleware;

use Closure;

class frontAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        $array = [];
        if($guard = 'owner_user'){
            $array = explode('_', $guard);
        }
        if(!empty($array)){

            if(\Auth::guard($array[0])->check()  || \Auth::guard($array[1])->check()){
                return $next($request);
            }else{
                return redirect()->route('front.login');
            }

        }else{

            if(\Auth::guard($guard)->check()){
                return $next($request);
            }else{
                return redirect()->route('front.login');
            }
        }


    }
}
