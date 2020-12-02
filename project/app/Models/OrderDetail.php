<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
	use SoftDeletes;
	
     protected $fillable = [
       'order_id','product_id','price','quantity','subtotal'
    ];

    public function products(){

       return $this->belongsTo('App\Models\Product','product_id','id');

    }

}
