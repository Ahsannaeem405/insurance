<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class user
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
        if(\Auth::user()->role=='user')
        {

            $user=\App\Models\User::find(\Auth::user()->id);
            $days=$user->register;
            $exp=$user->created_at->addDays($days);
         if($exp>=Carbon::now())
         {

         }
         else{
             $user->status=0;
             $user->update();
         }


            return $next($request);

        }
        else{
            return redirect('/');
        }
    }
}
