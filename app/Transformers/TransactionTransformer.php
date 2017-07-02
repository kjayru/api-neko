<?php

namespace App\Transformers;
use App\Transaction;
use League\Fractal\TransformerAbstract;

class TransactionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Transaction $transaction)
    {
        return [
                'identifier' => (int)$transaction->id,
                'quantity'=> (int)$transaction->quantity,
                'buyer'=> (int)$transaction->buyer_id,
                'product' => (int)$transaction->product_id,
                'creationDate' => $transaction->created_at,
                'lastChange' => $transaction->updated_at,
                'deletedDate' =>isset($transaction->deleted_at)?(string) $transaction->deleted_at:null,


            'links'=>[
                [
                    'rel' =>'self',
                    'href' => route('transactions.show',$transaction->id),   
                ],
                [
                    'rel' =>'transaction.seller',
                    'href' => route('transactions.buyers.index',$transaction->id),   
                ],
                [
                    'rel' =>'transaction.categories',
                    'href' => route('transactions.categories.index',$transaction->id),   
                ],
                
                [
                    'rel' =>'buyer',
                    'href' => route('buyer.show',$transaction->id),   
                ],

                [
                    'rel' =>'product',
                    'href' => route('products.show',$transaction->id),   
                ],
            ]
        ];
    }
}
