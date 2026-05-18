<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureApiKeyIsValid
{
    public function handle(Request $request, Closure $next): Response
    {
        $configuredApiKey = trim((string) config('app.api_key'));
        $requestApiKey = trim((string) $request->header('X-API-KEY'));

        if (blank($configuredApiKey)) {
            return response()->json([
                'message' => 'API key is not configured.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if (blank($requestApiKey) || ! hash_equals($configuredApiKey, $requestApiKey)) {
            return response()->json([
                'message' => 'Invalid API key.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
