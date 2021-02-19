<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacultySemester extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    Protected $table = 'faculty_semester';
    protected $fillable = ['faculty_id','semester_id'];
}
