<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class ADMMiddleware
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
                if (Auth::check() && Auth::user()->permission == "Admin")
        { 
            return $next($request);
        }
        else if (Auth::check() && Auth::user()->permission == "Adrimistrasi")
        { 
            return $next($request);
        }
        return redirect('/pageAksesKhusus');
    }
}
