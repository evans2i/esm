<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCategory extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $table = 'book_categories';
    protected $fillable = ['created_by', 'last_updated_by', 'title', 'slug', 'status'];
}
