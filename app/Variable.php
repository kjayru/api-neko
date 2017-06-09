<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $fillable = [
        'id','nombre','page_id'
    ];

    public function page(){

        return $this->hasMany(Page::class);
    }
}
