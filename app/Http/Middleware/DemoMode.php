<?php

namespace App\Http\Middleware;

use Closure;

class DemoMode
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
        if(config('app.demo_mode') && ($request->method() == 'POST' || $request->method() == 'PUT' || $request->method() == 'DELETE')) {
            return back()->with('errorMsg', 'This functionality is disabled in demo mode!');
        }
        return $next($request);
    }
}
