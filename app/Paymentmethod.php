<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentmethod extends Model
{
    protected $fillable = [

        'id','name','number','datemonth','dateyear','cvv','address','country','state','codposta','description'
    ];
}
