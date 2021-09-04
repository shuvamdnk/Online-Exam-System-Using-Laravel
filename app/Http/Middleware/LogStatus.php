<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
class LogStatus
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
        if(Auth::guard('faculty')->check()) {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online-' . Auth::guard('faculty')->user()->id, true, $expiresAt);
        }

        if(Auth::guard('student')->check()) {
            $expires = Carbon::now()->addMinutes(1);
            Cache::put('user-online-' . Auth::guard('student')->user()->id, true, $expires);
        }

        if(Auth::guard('admin')->check()) {
            $expires = Carbon::now()->addMinutes(1);
            Cache::put('user-' . Auth::guard('admin')->user()->id, true, $expires);
        }

        return $next($request);
    }

}
