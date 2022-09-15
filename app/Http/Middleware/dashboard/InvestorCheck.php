<?php

namespace App\Http\Middleware\dashboard;

use Closure;
use Auth;
use Illuminate\Http\Request;

class InvestorCheck
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
        if (Auth::user()->user_type == 'investor') {
            return $next($request);
        }
        return redirect()->back();
    }
}
