<?php

namespace App\Http\Middleware;

use Closure;

class PreventCacheMiddleware { 

    /*  Handle an incoming request. 
     *  @param \Illuminate\Http\Request $request
     *  @param \Closure $next 
     *  @return mixed 
     */ 
    public function handle($request, Closure $next) 
    { 
        $response = $next($request);
        //return $response;
        
        $response->headers->set('Cache-Control','no-cache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma','no-cache');
        $response->headers->set('Expires','Sun, 02 Jan 1990 00:00:00 GMT'); 

        return $response;
    } 
}