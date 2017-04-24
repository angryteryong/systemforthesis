<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      if($request->session()->get('status') === null){ //if no status
        session()->set('go', 0);
        return redirect('login');
      }
      else{ // if status is set
        if($request->session()->get('status') === '0'){ //if 0
          return redirect('login');
          session()->set('go', 0);
        }
      }
      session()->set('go', 1);
      return $next($request);
    }
}
