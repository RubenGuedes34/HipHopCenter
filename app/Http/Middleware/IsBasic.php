<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsBasic{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
       if(auth()->user()->type==0 || auth()->user()->type==0){
           return $next($request);
       }
       return redirect('home')->with('error',"You already payed.");
    }
}