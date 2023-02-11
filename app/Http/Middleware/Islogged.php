<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Islogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if($request->input('token') !== '12345678'){
        //     return redirect('home');
        // }
       // echo '<pre>';print_r($request->input('UsuarioLoginAdmin'));echo '</pre>';
         //print_r($request->input('UsuarioLoginAdmin'));
         if(!empty(session('usuario'))){
            return $next($request);
        }else{
            return redirect('/logar');
        }

    }
}
