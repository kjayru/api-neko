<?php

namespace App\Http\Controllers\Police;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Police;
class PoliceController extends ApiController
{
    
    public function index()
    {
        $polices = Police::has('police')->get();
        return $this->showAll($polices);
    }

   
    public function show(Plan $polices)
    {
        return $this->showOne($polices);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'name' => 'required',
            'description'=>'required',
            'phone' => 'required',
            'state' => 'required',
            'sendmail' => 'required'
           
        ];
        $this->validate($request, $rules);

        $newPolice = Page::create($request->all());

        return $this->showOne($newPolice,201);
    }

}