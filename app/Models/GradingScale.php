<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradingScale extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'gradingType_id', 'name', 'percentage_from','percentage_to','grade_point','description', 'status'];

    public function grading()
    {
        return $this->belongsTo(GradingType::class, 'id');
    }

    public function semester()
    {
        return $this->hasmany(Semester::class, 'gradingType_id');
    }
}
