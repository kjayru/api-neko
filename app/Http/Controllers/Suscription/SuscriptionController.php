<?php

namespace App\Http\Controllers\Suscription;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Suscription;
class SuscriptionController extends ApiController
{
    
    public function index()
    {
        $plans = Suscription::has('suscription')->get();
        return $this->showAll($plans);
    }

   
    public function show(Suscription $suscription)
    {
        return $this->showOne($suscription);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'activationdate' => 'required',
            'expirationdate' =>'required'
           
        ];
        $this->validate($request, $rules);

        $newSuscription = Suscription::create($request->all());

        return $this->showOne($newSuscription,201);
    }

}