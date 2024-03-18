<?php

namespace ByteFlick\LaravelStrictDomain\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RedirectExternalTraffic
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $domain = config('strict-domain.domain');
        $subDomainCheck = config('strict-domain.include_sub_domains');

        if ($request->getHttpHost() === config('strict-domain.domain') && ($subDomainCheck && Str::contains($request->getHttpHost(), [$domain]))) {
            return $response;
        }

        return redirect(sprintf('%s/%s', config('app.url'), request()->path()));

    }
}
