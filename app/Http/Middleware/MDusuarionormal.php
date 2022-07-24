<?php

namespace App\Http\Middleware;

use Closure;

class MDusuarionormal
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
        $usuario_actual = \Auth::user();
        if(isset($usuario_actual)){
            if($usuario_actual->id_tipo_usuario!=2){
                return redirect('sin_acceso_normal');
            }
        }else{
            return redirect('login');
        }

        return $next($request);
    }
}
