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
        if(mb_substr($request->getPathInfo(),-1)=='/' and $request->getPathInfo()!='/' and ($uri = $request->getRequestUri())!='/'){
            if(mb_substr($uri,0,mb_stripos($uri,'?')) != ''){
                $new_uri = mb_substr($request->getPathInfo(),0,-1).'?'.$request->getQueryString();
            }else{
                $new_uri = mb_substr($request->getPathInfo(),0,-1);
            }
            return redirect(env('APP_URL').$new_uri,301);
        }
        return $next($request);
    }
}
