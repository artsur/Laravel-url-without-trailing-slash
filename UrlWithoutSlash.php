<?php

namespace App\Http\Middleware;


use Closure;

class UrlWithoutSlash
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(mb_substr($request->getPathInfo(),-1)=='/' && ($uri = $request->getRequestUri())!='/'){
            if(mb_substr($uri,0,mb_stripos($uri,'?')) != ''){
                $new_uri = mb_substr($uri,0,mb_stripos($uri,'?')-1).mb_substr($uri,mb_stripos($uri,'?'));
            }else{
                $new_uri = mb_substr($request->getPathInfo(),0,-1);
            }
            return redirect(env('APP_URL').$new_uri,301);
        }

        return $next($request);
    }
}
