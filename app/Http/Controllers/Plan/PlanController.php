<?php

namespace App\Http\Controllers\Plan;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Plan;
class PlanController extends ApiController
{
    
    public function index()
    {
        $plans = Plan::has('languague')->get();
        return $this->showAll($plans);
    }

   
    public function show(Plan $plan)
    {
        return $this->showOne($plan);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'plan' => 'required',
           
        ];
        $this->validate($request, $rules);

        $newPlan = Page::create($request->all());

        return $this->showOne($newPlan,201);
    }

}