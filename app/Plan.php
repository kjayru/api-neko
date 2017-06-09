<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'id','plan','feature_id','paymentmethod_id','police_id'
    ];

    public function feature()
    {
        return $this->hasMany(Feature::class);
    }

    public function paymentmethod()
    {
        return $this->hasMany(Paymentmethod::class);
    }

    public function police()
    {
        return $this->hasMany(Police::class);
    }
}
