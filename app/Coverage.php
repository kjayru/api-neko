<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coverage extends Model
{
    protected $fillable = [
        'id','description','phone','product_id'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
