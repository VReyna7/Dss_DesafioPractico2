<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpleadoAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isset(auth()->user()->role)){
            if(auth()->user()->role == '2'){
                if(auth()->check()){
                    return $next($request);
                }
            }
        }else{
            return redirect()->to('/');
        }

        return redirect()->to('/');
    }
}
