<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignSubject extends BaseModel
{
    use SoftDeletes;
    protected $fillable = ['year_id','semester_id','subject_id','faculty_id', 'staff_id','created_by','last_updated_by'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
