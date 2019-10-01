<?php

namespace App\Http\Middleware;

use Closure;

class murid
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
      if(auth()->user()->master_jabatan_id == 3){
        return $next($request);
      }else{
        abort(403,'Anda Tidak Dapat Mengakses Halaman Ini.');
      }
    }
}
