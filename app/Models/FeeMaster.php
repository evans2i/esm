<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeMaster extends BaseModel
{
    use SoftDeletes;
    protected $table = 'fee_masters';
    protected $fillable = ['created_by', 'last_updated_by', 'year_id', 'student_id','faculty_id', 'semester_id', 'fee_head_id','fee_due_date','fee_amount','status'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function feeCollection()
    {
        return $this->hasMany(FeeCollection::class);
    }

    public function feeHead()
    {
        return $this->belongsTo(FeeHead::class, 'fee_head_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id', 'id');
    }

    protected $appends = [
        'toggle',
    ];

    public function getToggleAttribute()
    {
        return true;
    }


}

