<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class admin
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
         if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }
       
		elseif (Auth::check() && Auth::user()->role == 0) {
            return redirect()->route('home')->with('success','Та админ хэсэг руу хандах эрхгүй байна');
        }
        else {
            return redirect('/login')->with('status','Нэвтэрнэ үү');;
        }
    
    }
}
