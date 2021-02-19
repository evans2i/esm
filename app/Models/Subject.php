<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'title', 'code', 'full_mark_theory', 'pass_mark_theory',
        'full_mark_practical', 'pass_mark_practical', 'credit_hour', 'sub_type', 'class_type', 'staff_id',
        'description', 'status'];


    public function semester()
    {
        return $this->belongsToMany(Semester::class);
    }
}
