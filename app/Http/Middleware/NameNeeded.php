<?php

namespace App\Http\Middleware;

use Closure;

class NameNeeded{

    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        if(!auth()->guard('clients')->user()->name)
            return redirect()->route('editProfile');
        return $next($request);
    }
}
