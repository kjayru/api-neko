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
       $response = $next($request);
       if(isset($response->exception) && $response->exception instanceof validationException ){
            
            $data = $response->getData();

            $transformedErrors  =[];
            foreach($data->error as $field => $error){
                    $transformedField = $transformer::$trandsformedAttribute($field);
                    $transformedErrors[$transformedField] = str_replace($field, $transformedField,$error);

            };

            $data->errors  = $transformedErrors;
            $response->setData($data);
       }
       return $response;
    }


}