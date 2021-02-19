<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamMarkLedger extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'exam_schedule_id','student_id', 'obtain_mark_theory',
        'absent_theory','obtain_mark_practical','absent_practical', 'sorting_order', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id','id');
    }
 
    public function examSchedule()
    {
        return $this->belongsTo(ExamSchedule::class, 'exam_schedule_id','id');
    }

    public function getAbsentTheoryAttribute($value)
    {
        if($value == 1){
            $status = true;
        }elseif($value == 0){
            $status = false;
        }else{
            $status = $value;
        }
        return $status;
    }

    public function setAbsentTheoryAttribute($value)
    {
        //$this->attributes['status'] = $value == 'active'?1:0;

        if($value == false){
            $status = 0;
        }elseif($value == true){
            $status = 1;
        }else{
            $status = $value;
        }
        $this->attributes['absent_theory'] = $status;
    }

    public function getAbsentPracticalAttribute($value)
    {
        if($value == 1){
            $status = true;
        }elseif($value == 0){
            $status = false;
        }else{
            $status = $value;
        }
        return $status;
    }

    public function setAbsentPracticalAttribute($value)
    {
        //$this->attributes['status'] = $value == 'active'?1:0;

        if($value == false){
            $status = 0;
        }elseif($value == true){
            $status = 1;
        }else{
            $status = $value;
        }
        $this->attributes['absent_practical'] = $status;
    }


}
