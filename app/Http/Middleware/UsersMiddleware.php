<?php

namespace App\Http\Middleware;

use Closure;

class UsersMiddleware
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
        return redirect("/myaccount/login");
         }else{
            if (auth()->user()->privilege != 'user'){
             Session()->flash('message', "Please Login as user Not as Guest");
             return redirect("/myaccount/login");
        }
           return $next($request);
        }
    }
}
