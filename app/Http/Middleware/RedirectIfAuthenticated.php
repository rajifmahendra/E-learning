<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          // if(Auth::user()->master_status_id != 1){
          //   abort(403,'Gak bisa');
          // }
            return redirect('/home');
        }
        // if( App\master_data::where('nik',1)->select('master_status_id')->first() == 1){
        //   abort(403,'Status login anda tidak aktif, hubungi IT');
        // }

        return $next($request);
    }
}
