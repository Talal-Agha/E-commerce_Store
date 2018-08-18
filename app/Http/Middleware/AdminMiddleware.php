<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if(auth()->guard('nonAdldap')->guest()){
    return redirect()->route('adminlogin');
}else{
        if (auth()->guard('nonAdldap')->user()->privilege != 'admin'){
             return redirect()->route('adminlogin');
        }
      return $next($request);
    }
}

}
