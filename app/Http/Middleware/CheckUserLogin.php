<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if (($request->user() && in_array($request->user()->role, $role))) {
            return $next($request);
        }

        return redirect()->back()->with('danger', 'Anda tidak memiliki akses pada halaman ini');
    }
}