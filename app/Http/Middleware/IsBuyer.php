<?php

namespace App\Http\Middleware;

use Closure;

class IsBuyer{

    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        if(auth()->guard('clients')->user()->is_seller)
            return redirect()->route('show-seller');

        return $next($request);
    }
}
