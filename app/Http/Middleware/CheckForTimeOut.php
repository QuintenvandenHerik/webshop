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
    public function handle($request, Closure $next)
    {
        $date_1 = session('date_1');
        $date_2 = date('m/d/Y H:i:s', time());
        if(!isset($date_1)) {
            $date_1 = date('m/d/Y H:i:s', time());
            session(['date_1' => $date_1]);   
        }
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
        
        $interval = date_diff($datetime1, $datetime2);
        
        if(intval($interval->m) < 1 && intval($interval->d) < 1 && intval($interval->y) < 1) {
            if (intval($interval->h) == 1 && intval($interval->i) < 30 || intval($interval->h) == 0) {
                $date_1 = date('m/d/Y H:i:s', time());
                session(['date_1' => $date_1]);
                return $next($request);
            } else {
                session(['cartItems' => []]);
                $date_1 = date('m/d/Y H:i:s', time());
                session(['date_1' => $date_1]);
                return $next($request);

            }
        } else {
            session(['cartItems' => []]);
            $date_1 = date('m/d/Y H:i:s', time());
            session(['date_1' => $date_1]);
            return $next($request);
        }
    }
}
