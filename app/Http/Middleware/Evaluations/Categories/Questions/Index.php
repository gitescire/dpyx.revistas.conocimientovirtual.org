<?php

namespace App\Http\Middleware\Evaluations\Categories\Questions;

use App\Models\Announcement;
use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Index
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
        // if (Auth::user()->hasRole('usuario') && !Announcement::active()->first()) {
        //     return redirect()->route('welcome')->with('warning', '¡No hay convocatorias para el día de hoy!');
        // }

        return $next($request);
    }
}
