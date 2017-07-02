<?php

namespace App\Transformers;
use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
                'identifier' => (int)$category->id,
                'title'=> (string)$category->title,
                'details'=> (string)$category->description,
                'creationDate' => $category->created_at,
                'lastChange' => $category->updated_at,
                'deletedDate' =>isset($category->deleted_at)?(string) $category->deleted_at:null,

                'link'=>[
                    'rel' =>'self',
                    'href' => route('categories.show',$category->id),   
                ],
                'link'=>[
                    'rel' =>'category.buyers',
                    'href' => route('categories.buyers.index',$category->id),   
                ],
                'link'=>[
                    'rel' =>'category.products',
                    'href' => route('categories.products.index',$category->id),   
                ],
                'link'=>[
                    'rel' =>'category.sellers',
                    'href' => route('categories.sellers.index',$category->id),   
                ],
                'link'=>[
                    'rel' =>'category.transactions',
                    'href' => route('categories.transactions.index',$category->id),   
                ],
                
        ];
    }
}
