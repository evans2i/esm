<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookStatus extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'title', 'display_class', 'status'];

    public function bookCollection()
    {
        return $this->hasMany(Book::class, 'book_status');
    }
}
