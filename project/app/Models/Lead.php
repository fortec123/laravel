<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id','phone_no','lead_name','email','lead_details','source_id',
    ];

    public function source()
    {
        return $this->belongsTo('App\Models\Source');
    }

    public function installments()
    {
        return $this->hasMany('App\Models\Installment');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }
    
     public function note()
    {
        return $this->hasOne('App\Models\Note');
    }

     public function feedback()
    {
        return $this->hasOne('App\Models\Feedback');
    }

    public function amount_received()
    {
        return $this->hasMany('App\Models\Installment')->where(['status'=>2]);
    }

     public function user()
    {
        return $this->belongsTo('App\Models\User','asign_to');
    }



    
}
