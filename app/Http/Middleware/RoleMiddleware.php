<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; 

class RoleMiddleware
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
        
        
        if(Auth::user()->role=='1' || Auth::user()->role =='2'){
            return $next($request);
        }
        

        else{
            return redirect('/home')-> with('status','Your are Not Allowed To Admin Dashboard'); 
        }

        
    }
}
