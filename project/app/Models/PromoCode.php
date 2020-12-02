<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    //protected $table = 'money';

    protected $fillable = [
        'code','discount','image'
    ];
    
}
