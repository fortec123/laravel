<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Currency extends Model
{

	public $table = "currency";

	use SoftDeletes;
	
     protected $fillable = [
       'NumCode','CharCode','Nominal','Name','Value'
    ];


}
