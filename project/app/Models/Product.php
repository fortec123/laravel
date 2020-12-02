<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
     protected $fillable = [
       'category_id','name','description','actual_price','sale_price','packaging','image','status','is_recommended','is_popular','discount'

    ];

}
