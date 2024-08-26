<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;

class GeneralChecks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     *
     * @throws \Illuminate\Session\TokenMismatchException
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Show message to IE 8 and before users
        if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/(?i)msie [2-8]/', $_SERVER['HTTP_USER_AGENT'])) {
            session()->flash('message', 'Please update your browser. This application requires a modern browser.');
        }

        return $next($request);
    }
}
