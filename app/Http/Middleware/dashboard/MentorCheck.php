<?php

namespace App\Http\Middleware\dashboard;

use Closure;
use Auth;
use Illuminate\Http\Request;

class MentorCheck
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
        if (Auth::user()->user_type == 'mentor') {
            return $next($request);
        }
        return redirect()->back();
    }
}
