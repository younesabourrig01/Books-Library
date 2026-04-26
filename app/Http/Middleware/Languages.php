<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;


class Languages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        App::setLocale(session('locale', 'en'));

        return $next($request);
    }
}
