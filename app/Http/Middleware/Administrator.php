<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
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
        if($request->user()->user_category_id != 1){
          return redirect('home'); //por ahora es esa redirección, y puede ser como el perfilUsuario
        }
        return $next($request);
    }
}
