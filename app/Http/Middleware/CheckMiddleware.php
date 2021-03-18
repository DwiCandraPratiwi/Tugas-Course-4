<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $gender)
    {

        if(Auth::user()){
            if(Auth::user()->email == 'dwican@gmail.com'){
                if($gender != 'perempuan'){
                    return $next($request);
                }else{
                    return redirect('/home');
                }
            }
            else{
                return redirect('/home');
            }
        } else{
            return redirect('/login');
        }

        // if(Auth::check()){
        //     if(Auth::user()->email == 'dwican@gmail.com'){
        //         return $next($request);
        //     }
        //     else{
        //         return redirect('/home');
        //     }
        // } else{
        //     return redirect('/login');
        // }
    }

    
}
