<?php

namespace App\Http\Middleware;

use App\Models\Seller;
use Closure;

class IsAuthenticated{

    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        $client_id = auth()->guard('clients')->user()->id;
        $seller = Seller::query()->where('client_id' , '=' , $client_id)->firstOrFail();

        if($seller->is_active == 0)
            return redirect()->route('step_one');
        elseif($seller->is_active == 1)
            return redirect()->route('step_two');
        elseif($seller->is_active == 2)
            return redirect()->route('step_three');

        return $next($request);
    }
}
