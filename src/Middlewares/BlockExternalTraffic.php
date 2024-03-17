<?php

namespace ByteFlick\LaravelStrictDomain\Middlewares;

use Closure;
use Illuminate\Http\Request;

class BlockExternalTraffic
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $domain = config('strict-domain.domain');

        if ($request->getHttpHost() !== $domain) {
            abort(400, sprintf('Traffic outside %s host is not allowed.', $domain));
        }

        return $response;
    }
}
