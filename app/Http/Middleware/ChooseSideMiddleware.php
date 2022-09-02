<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Mentor;
use App\Models\Investor;
use App\Models\Startup;
class ChooseSideMiddleware
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
        if(Mentor::where('user_id', Auth::user()->id)->first()){
            return redirect('/home')
        }else if(Investor::where('user_id', Auth::user()->id)->first()){
            return redirect('/home')
        }else if(Startup::where('user_id', Auth::user()->id)->first()){
            return redirect('/home')
        }
        return $next($request);
    }
}
