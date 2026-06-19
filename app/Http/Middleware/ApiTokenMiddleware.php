<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json([
                'message' => 'Требуется авторизация'
            ], 401);
        }

        $user = User::where('api_token', $token)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Неверный токен'
            ], 401);
        }

        auth()->login($user);

        return $next($request);
    }
}
