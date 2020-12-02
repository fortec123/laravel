<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{

	public $table = "contact_us";

	use SoftDeletes;
	
     protected $fillable = [
       'name','email','phone_no','description'
    ];

}
