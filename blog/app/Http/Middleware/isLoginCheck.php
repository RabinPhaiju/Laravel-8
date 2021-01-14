<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isLoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->login && $request->login=true){
            return redirect('user/rabin');
        }
        else{
            return $next($request);
        }
        
    }
}
