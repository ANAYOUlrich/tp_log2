<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class BasicAuth
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
        if(Auth::guest() ){
            // Session::flash('error', "Vous devez etre connecté pour voir cette page");
            return redirect('admin/auth/login');
        }

        if(Auth::user()->level==0){
            auth()->logout();
            Session::flash('error', "Votre compte est bloquer veuiller contacter un administrateur");
            return redirect('admin/auth/login');
        }
        return $next($request);
    }
}
