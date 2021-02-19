<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferCertificate extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'students_id', 'date_of_issue', 'date_of_leaving', 'tc_num', 'leaving_time_class', 'qualified_to_promote','paid_fee_status','character','ref_text','status'];
}
