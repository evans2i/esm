<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'semesters_id','subjects_id','meeting_id', 'topic', 'start_time', 'duration', 'timezone',
        'start_url', 'join_url','history_type','ref_text','status'];

}
