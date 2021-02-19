<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamSchedule extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = [
        'created_by', 
        'last_updated_by', 'years_id','months_id', 'exams_id', 
        'faculty_id','semesters_id', 'subjects_id',
        'date', 'start_time', 'end_time', 'full_mark_theory', 
        'pass_mark_theory', 'full_mark_practical',
        'pass_mark_practical','sorting_order', 'publish_status', 'status'];



    public function markLedger()
    {
        return $this->hasMany(ExamMarkLedger::class, 'exam_schedule_id','id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjects_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semesters_id');
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exams_id');
    }
    public function month()
    {
        return $this->belongsTo(Month::class, 'months_id');
    }
    public function year()
    {
        return $this->belongsTo(Year::class, 'years_id');
    }


}
