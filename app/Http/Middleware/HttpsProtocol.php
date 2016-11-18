<?php 
namespace App\Http\Middleware;

use Closure;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        if ( $request->server('HTTP_X_FORWARDED_PROTO') == 'https' ) {
            \URL::forceSchema('https');
        }

        return $next($request);
    }
}
?>