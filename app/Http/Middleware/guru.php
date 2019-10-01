<?php

namespace App\Http\Middleware;

use Closure;

class guru
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
      if(auth()->user()->master_jabatan_id == 1 or auth()->user()->master_status_id == 1){
        // if(auth()->user()->master_status_id == 1){
        //   // if(auth()->user()->master_jabatan_id == 1){
          return $next($request);
        // }else{
        //     abort(403,'Status login anda tidak aktif, hubungi IT');
        // }
      }else{
        // throw new \Exception('Anda tidak memiliki hak akses ke halaman ini');
        abort(403,'Anda tidak memiliki hak akses ke halaman ini');
      }
    }
}
