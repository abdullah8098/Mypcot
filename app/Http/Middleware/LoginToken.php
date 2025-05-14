<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class LoginToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['error' => 'Unauthorized','status' => '100'], 401);
        }

        $user = User::where('token', $token)->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized','status' => '100'], 401);
        }

       //  $request->user = $user;

        return $next($request);
    }
}
