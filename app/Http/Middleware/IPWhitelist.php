<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IPWhitelist
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
        $whitelist = [
        '127.0.0.1',
        ];

        if(in_array($request->ip(),$whitelist))
        {
            return $next($request);
        }
        else
        {
            return response('Nincs jogosultságod az oldal megtekintéséhez!',401);
        }
    }
}
