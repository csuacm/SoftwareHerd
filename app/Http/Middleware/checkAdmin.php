<?php

namespace SoftwareHerd\Http\Middleware;

use Closure;

class checkAdmin
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
        if(!\Auth::user())
            return redirect('/home');
        if(!(\Auth::user()->isSuperAdmin())){
            return redirect('/home');
        }
        return $next($request);
    }
}
