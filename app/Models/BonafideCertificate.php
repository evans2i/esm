<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BonafideCertificate extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'students_id', 'date_of_issue', 'course', 'period', 'character', 'ref_text','status'];
}
