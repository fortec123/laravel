<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{

	//public $table = "contact_us";

	use SoftDeletes;
	
     protected $fillable = [
       'user_id','name','phone_no','address','city','state'
    ];

}
