<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Administracion
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
        try {
            if(auth()->check() && auth()->user()->name !== 'Admin'){
                return redirect('/');
            }
            return $next($request);
        }catch (\Exception $e){
            return redirect('/');
        }

    }
}
