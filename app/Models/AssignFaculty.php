<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignFaculty extends BaseModel
{
    use SoftDeletes;
    protected $fillable = ['year_id','faculty_id', 'staff_id','created_by','last_updated_by'];

   
    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'faculty_id','id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id','id');
    }
    public function year()
    {
        return $this->belongsTo(Year::class,'year_id','id');
    }
}
