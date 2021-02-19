<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends BaseModel
{
    use SoftDeletes;
      // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'book_master_id', 'book_code', 'book_status_id'];

    public function bookMaster()
    {
        return $this->belongsTo(BookMaster::class,'book_master_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class,'last_updated_by', 'id');
    }

    public function bookStatus()
    {
        return $this->belongsTo(BookStatus::class,'book_status_id', 'id');
    }

    public function libBookIssue()
    {
        return $this->hasMany(BookIssue::class, 'book_id');
    }
}
