<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = ['id','name','description'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}