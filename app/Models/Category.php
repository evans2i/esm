<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by',  'title', 'status'];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id','id');
    }

}
