<?php namespace Syehan\ForgotPassword\Middleware;

class AlwaysAcceptJson {
    public function handle($request, $next){
        $request->headers->set('Accept', 'application/json');
        return $next($request);
    }
}
