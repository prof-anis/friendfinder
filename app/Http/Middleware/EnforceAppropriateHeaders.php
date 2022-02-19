<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnforceAppropriateHeaders
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('Accept') && $request->header('Accept') == 'application/json') {
            return $next($request);
        }

        abort(400, "Request must contain an Accept header set to application/json");
    }
}
