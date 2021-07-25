<?php

namespace App\Pipelines;

use Closure;

class Name {
    public function handle($request, Closure $next){
        if(!request()->has('name')){
            return $next($request);
        }
        $app = $next($request);
        return $app->where('name', 'like', request('name').'%');
    }
}
