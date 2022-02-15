<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class isMitra
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (Auth::user()->level == 'mitra') { 
            return $next($request);
        } elseif (Auth::user()->level == 'admin') { 
            abort(403, "Cannot access to restricted page");
        } elseif (Auth::user()->level == 'customer') { 
            abort(403, "Cannot access to restricted page");
        }

    }
}
