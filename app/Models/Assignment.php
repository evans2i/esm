<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends BaseModel
{
    use SoftDeletes;
      // protected $guarded = ['id'];
    protected $fillable = ['year_id','faculty_id','semester_id','subject_id','publish_date',
        'end_date', 'title','description','file', 'status','created_by', 'last_updated_by'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id');
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function answers()
    {
        return $this->hasMany(AssignmentAnswer::class,'assignment_id','id');
    }

}
