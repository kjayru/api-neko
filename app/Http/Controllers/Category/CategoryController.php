<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Category;
class CategoryController extends ApiController
{
     public function __construct()
    {
        parent::__contruct();
        $this->middleware('transform.input'.CategoryTransformer::class)->only(['store','update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $this->showAll($categories);
    }

    
    public function show(Category $category)
    {
        //$seller = Seller::has('products')->findOrFail($id);
        return $this->showOne($category);
    }

    public function store(Request $request)
    {
        $rules=[
            'name' => 'required',
            'description' => 'required',
        ];
        $this->validate($request, $rules);

        $newCategory = Category::create($request->all());

        return $this->showOne($newCategory,201);
    }

    public function update(Request $request, Category $category)
    {
        $category->fill($request->intersect([
                'name',
                'description',
            ]));

        if ($category->isClean()) {
            return $this->errorResponse('necesita especificar un valor diferente para actualizar',422);
        }

        $category->save();

        return $this->showOne($category);

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return $this->showOne($category);
    }

}
