<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    protected $fillable = [
            'id','name','description','phone','state','sendmail','product_id'
        ];

    public function Product()
    {
        
       return $this->hasMany(Product::class);
     }
    
}
