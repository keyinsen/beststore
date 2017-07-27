<?php

namespace App\Http\Middleware\home;

use Closure;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $islogin = true;
        if($islogin){
        	return $next($request);
        }else{
        	redirect('home/login')->send();
        }
    }
}
