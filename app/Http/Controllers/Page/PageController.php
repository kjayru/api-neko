<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Page;
class PageController extends ApiController
{
    
    public function index()
    {
        $pages = Page::has('languague')->get();
        return $this->showAll($pages);
    }

   
    public function show(Page $page)
    {
        return $this->showOne($page);
    }


    public function store(Request $request)
    {
        $rules=[
            
            'page_name' => 'required',
           
        ];
        $this->validate($request, $rules);

        $newPage = Page::create($request->all());

        return $this->showOne($newPage,201);
    }

}