<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class isActiveClient
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
        if(Gate::allows('isActive')){
            return $next($request);  
          }
          else{
            Auth::logout();
            return redirect('login');
          }
    }
}
