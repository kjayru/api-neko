<?php

namespace App\Http\Controllers\Coverage;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Coverage;
class CoverageController extends ApiController
{
    
    public function index()
    {
        $coverages = Coverage::has('complaint')->get();
        return $this->showAll($coverages);
    }

   
    public function show(Coverage $coverage)
    {
        
        return $this->showOne($coverage);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'description' => 'required',
            'phone'=>'required',
        ];
        $this->validate($request, $rules);

        $newCoverage = Coverage::create($request->all());

        return $this->showOne($newCoverage,201);
    }

}