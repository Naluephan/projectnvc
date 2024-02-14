<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\CustomPersonalAccessToken;
use Laravel\Sanctum\Sanctum;


class CustomSanctumAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            // No token provided
            return response()->json(['error' => 'Token not provided'], 401);
        }
        try {
            $decryptedToken = Crypt::decrypt($token);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
