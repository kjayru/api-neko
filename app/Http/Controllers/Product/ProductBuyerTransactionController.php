<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductBuyerTransactionController extends ApiController
{
    
    public function store(Request $request, Product $product, Seller $seller)
    {
        $rules = [
        'quantity' => 'required|integer|min:1'
        ];

        $this->validate($request, $rules);

        if ($buyer->id == $product->seller_id) {
            return $this->errorResponse('
El comprador debe ser diferente del vendedor',409);
        }
        if (!$buyer->isVerified()) {
            return $this->errorResponse('El comprador debe ser un usuario verificado',409);
        }
        if (!$product->seller->isVerified()) {
            return $this->errorResponse('El vendedor debe ser un usuario verificado',409);
        }

        if ($product->isAvailable()) {
            
            return $this->errorResponse('El producto no esta disponible',409
        
        }

        if ($product->quantity <$request->quantity) {
            return $this->errorResponse('El producto no tiene unidades suficientes para esta transacción',409)
        }

        return DB::transaction(function() use($request,$product,$buyer){
            $product->quantity -= $request->quantity;
            $product->save();

            $transaction = Transaction::create([
                'quantity' => $request->quantity,
                'buyer_id' => $buyer->id,
                'product_id' => $product->id,
            ]);
            return $this->showOne($transaction,201);
        });
    }

}
