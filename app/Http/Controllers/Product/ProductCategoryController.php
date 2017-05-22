<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $categories = $product->categories;
        return $this->showAll($categories);
    }


    public function update(Request $request, Product $product,Category $category)
    {
        $product->categories()->syncWithoutDetach([$category->id]);

        return $this->showAll($product->categories);
       /* rules = [
         'name' => '',
         'description' ->
        ];*/
    }

    public function destroy(Product $product, Category $category)
    {
       if ($product->categories()->find($category->id)) {
           return $this->errorResponse('la categoria especifica no es una categoria de este producto ',404);
       }
        $product->categories()->detach($category->id);

        return $this->showAll($product->categories);
    }

    
}
