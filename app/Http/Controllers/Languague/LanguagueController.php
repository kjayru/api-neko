<?php

namespace App\Http\Controllers\Languague;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Languague;
class LanguagueController extends ApiController
{
    
    public function index()
    {
        $languagues = Languague::has('languague')->get();
        return $this->showAll($languagues);
    }

   
    public function show(Languague $languague)
    {
        return $this->showOne($languague);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'languague_name' => 'required',
           
        ];
        $this->validate($request, $rules);

        $newLanguague = Languague::create($request->all());

        return $this->showOne($newLanguague,201);
    }

}