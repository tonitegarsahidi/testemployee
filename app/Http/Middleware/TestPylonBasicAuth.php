<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestPylonBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = $request->getUser();
        $password = $request->getPassword();

        // Check if username and password match the hardcoded values
        if ($username !== 'myuser' || $password !== 'mypassword') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
