<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class langChange
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
        if(app()->getLocale() != "ar" ){
            //            $request->route('parameter_name')
            app()->setLocale("ar");
        }
        return $next($request);
    }
}
