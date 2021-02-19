<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuardianDetail extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];

    protected $fillable = ['created_by', 'last_updated_by', 'guardian_first_name', 'guardian_middle_name', 'guardian_last_name',
        'guardian_eligibility', 'guardian_occupation', 'guardian_office', 'guardian_office_number', 'guardian_residence_number',
        'guardian_mobile_1', 'guardian_mobile_2', 'guardian_email', 'guardian_relation', 'guardian_address','guardian_image',  'status'];

    public function students()
    {
        return $this->hasMany(Student::class,'guardian_id','id');
    }

}
