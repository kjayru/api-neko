<?php

namespace App\Http\Middleware;

use Closure;

class TransformInput{

    public function handle($request, Closure $next,$transformer)
    {

        $transformerInput = [];
        foreach($request->request->all() as  $input => $value){
            $transformedInput[$transformer::originalAttribute($input)] = $value;
        }
        $request->replace($transformedInput);
        return $next($request);
    }


}