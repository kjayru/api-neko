<?php

namespace App\Http\Controllers\Complaint;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Complaint;
class ComplaintController extends ApiController
{
    
    public function index()
    {
        $complaints = Complaint::has('complaint')->get();
        return $this->showAll($complaints);
    }

   
    public function show(Complaint $complaint)
    {
        
        return $this->showOne($complaint);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'name' => 'required',
            'description'=>'required',
        ];
        $this->validate($request, $rules);

        $newComplaint = Complaint::create($request->all());

        return $this->showOne($newComplaint,201);
    }

}