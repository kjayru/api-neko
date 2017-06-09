<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancel extends Model
{
    protected $fillable = [
        'id','description','user_id','product_id'
    ];


    public function user(){
        return $this->hasMany(User::class);
    }

    public function product(){
        return $this->hasMany(Product::Class);
    }

}
