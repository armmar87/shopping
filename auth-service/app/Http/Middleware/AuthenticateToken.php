<?php

namespace App\Http\Middleware;

use App\Services\AuthServiceClient;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateToken
{
    public function __construct(protected AuthServiceClient $authService)
    {}

    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        $user = $this->authService->getAuthenticatedUser($token);

        if (!$user) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        // attach user data to request
        $request->merge(['auth_user' => $user]);

        return $next($request);
    }
}
