<?php

namespace App\Pipelines;

use Closure;

class Active {
    public function handle($request, Closure $next){
        if(!request()->has('active')){
            return $next($request);
        }
        $app = $next($request);
        return $app->where('active', request('active'));
    }
}
