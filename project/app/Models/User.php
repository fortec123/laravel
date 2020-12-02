<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use SoftDeletes;
	
     protected $fillable = [
       'user_id','name','email','password','orignal_password','phone_no','is_admin','referral_code','device_type','device_id','image'
    ];

    public function address(){
    	return $this->hasMany('App\Models\Address');
    }

}
