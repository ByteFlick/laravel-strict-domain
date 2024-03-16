<?php

namespace ByteFlick\LaravelStrictDomain\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BlockExternalTraffic
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $domain = config('strict-domain.domain');

        if ($request->getHttpHost() !== $domain) {
            throw ValidationException::withMessages([sprintf('Traffic outside %s host is not allowed.', $domain)]);
        }

        return $response;
    }
}
