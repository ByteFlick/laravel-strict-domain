<?php

namespace ByteFlick\LaravelStrictDomain\Middlewares;

use Closure;
use Illuminate\Http\Request;

class RedirectExternalTraffic
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->getHttpHost() !== config('strict-domain.domain')) {
            return redirect(sprintf('%s/%s', config('app.url'), request()->path()));
        }

        return $response;
    }
}
