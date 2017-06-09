<?php

namespace App\Http\Controllers\Feature;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Feature;
class FeatureController extends ApiController
{
    
    public function index()
    {
        $features = Feature::has('feature')->get();
        return $this->showAll($features);
    }

   
    public function show(Feature $feature)
    {
        return $this->showOne($feature);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'name' => 'required',
            'description'=>'required',
        ];
        $this->validate($request, $rules);

        $newFeature = Feature::create($request->all());

        return $this->showOne($newFeature,201);
    }

}