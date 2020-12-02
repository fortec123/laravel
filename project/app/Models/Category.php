<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class Category extends Model
{

	//public $table = "categories";

	use SoftDeletes;
	
     protected $fillable = [
       'name','category_id','image'
    ];


    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function subcategory()
	{
		  $url = url('storage/app/images');
	    return $this->hasMany(Category::class)->select(array('*', DB::raw("CONCAT('$url/', image) AS image")));
	}

	public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

}
