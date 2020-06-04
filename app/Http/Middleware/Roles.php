<?php

namespace App\Http\Middleware;

use Closure;

class Roles
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
        $roles = $request->user()->roles;
        if($roles->isEmpty()){
            abort(403, "No tiene permisos en este módulo");
        }else{
            foreach($roles as $rol){
                if($rol->name == 'admin'){
                    return redirect()->route('');
                }
            }
        }

        return $next($request);
    }
}
