<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;
	
     protected $fillable = [
       'user_id','order','total','address_id','promo_id'
    ];



    public function order_detail(){

       return $this->hasMany('App\Models\OrderDetail','order_id','id');

    }

    public function payment(){

       return $this->hasOne('App\Models\Payment');

    }

    public function user(){

       return $this->belongsTo('App\Models\User');

    }

    public function delivery_address(){

       return $this->belongsTo('App\Models\Address','address_id','id');

    }




}
