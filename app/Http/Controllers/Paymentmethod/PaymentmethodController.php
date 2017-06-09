<?php

namespace App\Http\Controllers\Paymentmethod;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Paymentmethod;
class PaymentmethodController extends ApiController
{
    
    public function index()
    {
        $paymentmethods = Paymentmethod::has('languague')->get();
        return $this->showAll($paymentmethods);
    }

   
    public function show(Paymentmethod $paymentmethod)
    {
        return $this->showOne($paymentmethod);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'name' => 'required',
            'number' => 'required',
            'datemonth' => 'required',
            'dateyear' => 'required',
            'cvv' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'codpostal' => 'required',
            'description' => 'required',
           
        ];
        $this->validate($request, $rules);

        $newPayment = Paymentmethod::create($request->all());

        return $this->showOne($newPayment,201);
    }

}