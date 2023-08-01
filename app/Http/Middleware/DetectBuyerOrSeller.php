<?php

namespace App\Http\Middleware;

use Closure;

class DetectBuyerOrSeller{

    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(!auth()->guard('clients')->check())
            return redirect()->route('login');

        if(auth()->guard('clients')->user()->is_seller)
            return redirect()->route('show-seller');
        else
            return redirect()->route('show-buyer');
        /*
        return $next($request);*/
    }
}
