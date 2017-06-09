<?php

namespace App\Http\Controllers\Cancel;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Cancel;
class CancelController extends ApiController
{
    
    public function index()
    {
        $buyers = Cancel::has('cancels')->get();
        return $this->showAll($buyers);
    }

   
    public function show(Cancel $cancel)
    {
        
        return $this->showOne($cancel);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'description' => 'required',
        ];
        $this->validate($request, $rules);

        $newCancel = Category::create($request->all());

        return $this->showOne($newCancel,201);
    }

}