<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendanceStatus extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'title', 'display_class', 'status'];

}
