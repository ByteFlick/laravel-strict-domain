<?php

namespace ByteFlick\LaravelStrictDomain\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlockExternalTraffic
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $domain = config('strict-domain.domain');
        $subDomainCheck = config('strict-domain.include_sub_domains');

        if ($request->getHttpHost() === $domain || ($subDomainCheck && Str::contains($request->getHttpHost(), [$domain]))) {
            return $response;
        }

        abort(400, sprintf('Traffic outside %s host is not allowed.', $domain));
    }
}
