<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookIssue extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'member_id', 'book_id',  'issued_on', 'due_date', 'return_date', 'status'];

    public function libMember()
    {
        return $this->belongsTo(LibraryMember::class, 'member_id','id');
    }

    public function libBook()
    {
        return $this->belongsTo(Book::class, 'book_id','id');
    }
}
