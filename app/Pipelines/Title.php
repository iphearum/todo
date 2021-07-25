<?php

namespace App\Pipelines;

use Closure;

class Title {
    public function handle($request, Closure $next){
        if(!request()->has('title')){
            return $next($request);
        }
        $app = $next($request);
        return $app->where('title', 'like', request('title').'%');
    }
}
