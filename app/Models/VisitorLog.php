<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitorLog extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'date', 'purpose', 'name', 'phone', 'email', 'id_doc', 'id_num', 'in_time', 'out_time', 'token', 'note', 'attachment', 'status'];
}
