<?php

namespace App\Http\Middleware;

use Closure;
use App;

class ForceHttps {
    /**
     * Redirect non-https requests to their https equiv
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if($request->secure() || ! App::environment('production')) {
            return $next($request);        
        }

        // if needed...
        // $request->getFacadeRoot()->fullUrl(),
        $url = 'https' . substr($request->fullUrl(), 4);
        return redirect($url);
    }
}
