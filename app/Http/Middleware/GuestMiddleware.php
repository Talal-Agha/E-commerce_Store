<?php

namespace App\Http\Middleware;

use Closure;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      if(auth()->guest()){
        return redirect("/myaccount/login?forCheckOut=true");
         }else{
           return $next($request);
        }
    }
}
