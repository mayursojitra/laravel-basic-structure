<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ApiAuth
{
    protected  $success_status = 200;

    protected  $error_status = 200;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('api')->check()) {
            return response()->json(['error_code'=>500,'error_msg' => 'You are not authorised user!'], $this->error_status); 
        }
        return $next($request);
    }
}
