<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
        if($req->path()=="login" && $req->session()->has('user')){
            return redirect('/');
        }
        else if($req->path()=="signup" && $req->session()->has('user')){
            return redirect('/');
        }
        else if($req->path()=="addToCart" && !$req->session()->has('user')){
            return redirect('/login');
        }
        else if($req->path()=="myorder" && !$req->session()->has('user')){
            return redirect('/login');
        }
        else if($req->path()=="cart" && !$req->session()->has('user')){
            return redirect('/login');
        }
            return $next($req);
        
    }
}
