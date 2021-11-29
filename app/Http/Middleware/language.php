<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class language
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

        $langg =   \Session::get('lang');

     //   dd($langg);
        if($langg)
        {
            \App::setlocale($langg);

        }
        else
        {
            \App::setlocale('en');
        }
        return $next($request);
    }
}
