<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    //
    protected $fillable = ['created_by', 'last_updated_by','member_type', 'member_id', 'subject', 'note', 'status'];
}
