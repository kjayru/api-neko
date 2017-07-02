<?php

namespace App\Transformers;
use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
                'identifier' => (int)$product->id,
                'title'=> (string)$product->name,
                'details'=> (string)$product->description,
                'stock' =>  (string)$product->quantity, 
                'situation' => (string)$product->status, 
                'picture' => url("img/{$product->image}"), 
                'seller' => (int)$product->seller_id,      
                'creationDate' => $product->created_at,
                'lastChange' => $product->updated_at,
                'deletedDate' =>isset($product->deleted_at)?(string) $product->deleted_at:null,
            
            'links'=>[
                    [
                        'rel' =>'self',
                        'href' => route('products.show',$product->id),   
                    ],
                    [  
                        'rel' =>'product.buyers',
                        'href' => route('products.buyers.index',$product->id),   
                    ],
                    [
                        'rel' =>'product.categories',
                        'href' => route('products.categories.index',$product->id),   
                    ],
                    
                    [
                        'rel' =>'product.transactions',
                        'href' => route('products.transactions.index',$product->id),   
                    ],
                    [
                        'rel' =>'seller',
                        'href' => route('sellers.index',$product->id),   
                    ],
            ]

        ];
    }
}
