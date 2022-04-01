<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;

use Closure;
use Illuminate\Http\Request;

class ActiveMemberShip
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Gate::allows('isGoing')){
          return $next($request);  
        }
        else{
          return redirect('provider/membership');
        }
    }
}
