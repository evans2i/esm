<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookMaster extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'isbn_number', 'code', 'title', 'sub_title', 'image',
        'language', 'editor', 'book_category_id', 'edition', 'edition_year', 'publisher', 'publish_year', 'series', 'author',
        'rack_location', 'price', 'total_pages', 'source', 'notes', 'status'];

    public function bookCollection()
    {
        return $this->hasMany(Book::class, 'book_master_id');
    }
    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class,'book_category_id', 'id');
    }

}
