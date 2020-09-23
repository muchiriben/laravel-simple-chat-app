<?php

namespace App\Http\Middleware;

use Closure;
//use Auth;
//use Carbon\Carbon;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class OnlineStatus
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
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(2);
           // Cache::put('key', 'value', now()->addMinutes(10));
            Cache::put('user-is-online' .Auth::user()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
