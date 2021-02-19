<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicInfo extends Model
{
	use SoftDeletes;
	// protected $guarded = ['id'];

    protected $fillable = ['created_by', 'last_updated_by', 'student_id', 'institution', 'board','pass_year','symbol_no',
        'percentage', 'division_grade', 'major_subjects', 'remark', 'sorting_order','status'];

}
