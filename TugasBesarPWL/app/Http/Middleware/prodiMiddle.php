<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class prodiMiddle
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
        if ($request->user()->role_id_role == '2') {
            return $next($request);
        }
        return redirect()->route('unauthorized');
    }
}
