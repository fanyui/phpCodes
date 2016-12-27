<?php

namespace App\Http\Middleware;
//use App\Http\Controllers\Auth;
//use Illuminate\Auth;

use Closure;

class accessRight
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
        $user = $request->user();

        if ($user && $user->accessLevel == 'ADMIN') {
          return $next($request);
        }

        // if($user)
        // //else 
        //    return  redirect('/patient/create');
        //     //return $next('patientController@create');
        elseif ($user && $user->accessLevel == 'USER') 
            return redirect('/patient/create');
        else
         abort(404,'what are you doing here');
        
     }
}
