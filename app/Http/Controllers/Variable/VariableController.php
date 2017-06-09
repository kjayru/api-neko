<?php

namespace App\Http\Controllers\Variable;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Variable;
class VariableController extends ApiController
{
    
    public function index()
    {
        $variables = Variable::has('variable')->get();
        return $this->showAll($variables);
    }

   
    public function show(Variable $variable)
    {
        return $this->showOne($variable);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'nombre' => 'required',
            
           
        ];
        $this->validate($request, $rules);

        $newVariable = Variable::create($request->all());

        return $this->showOne($newVariable,201);
    }

}