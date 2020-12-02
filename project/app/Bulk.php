<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Bulk extends Model
{
    protected $table = 'leads';
    protected $fillable = [
        'user_id','source_id', 'lead_name','lead_details', 'email','phone_no',

    ];
}

