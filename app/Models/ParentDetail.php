<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentDetail extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'grandfather_first_name', 'grandfather_middle_name',
        'grandfather_last_name', 'father_first_name', 'father_middle_name', 'father_last_name', 'father_eligibility',
        'father_occupation', 'father_office', 'father_office_number', 'father_residence_number', 'father_mobile_1',
        'father_mobile_2', 'father_email', 'mother_first_name', 'mother_middle_name', 'mother_last_name',
        'mother_eligibility', 'mother_occupation', 'mother_office', 'mother_office_number', 'mother_residence_number',
        'mother_mobile_1', 'mother_mobile_2', 'mother_email', 'father_image','mother_image','status'];

    public function students()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }

}
