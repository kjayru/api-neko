<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\BuyerTransformers;
class Category extends Model
{
	use SoftDeletes;
    public $transformer = CategoryTransformer::class;
	protected $dates = ['deleted_at'];
  
    protected $fillable = [
    	'name','description',
    ];
   

    

    public function Products()
    {

    	return $this->belongsToMany(Product::class); 
    }
}
