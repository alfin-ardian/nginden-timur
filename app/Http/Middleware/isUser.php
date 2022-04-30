<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class user
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
        if ($request->user()->id_role == 4) {
            return $next($request);
        } elseif ($request->user()->id_role == 1 || $request->user()->id_role == 2) {
            return redirect('/admin');
        }
        return redirect('/');
    }
}
