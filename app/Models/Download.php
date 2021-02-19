<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Download extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'semesters_id', 'subjects_id', 'title','description','file', 'status'];
}
