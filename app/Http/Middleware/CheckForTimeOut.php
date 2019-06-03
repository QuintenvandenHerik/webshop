<?php

namespace App\Http\Middleware;

use Closure;

class CheckForTimeOut
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(request $request, Closure $next)
    {
        $time = date("H:i:s");
        $endTimeHour = date('H') + 1;
        $endTimeMinute = date('i') + 30;
        $endTimeSecond = date('s') + 1;
        $endTime = $endTimeHour . ':' . $endTimeMinute . ':' . $endTimeSecond;
        if($time >= $endTime) {
            return $next($request);
        }
    }
}
