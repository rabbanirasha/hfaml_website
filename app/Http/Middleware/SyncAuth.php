<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SyncAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $provided = $request->header('X-Sync-Token');
        $expected = config('services.sync.secret');

        if (! $provided || ! $expected || ! hash_equals($expected, $provided)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}