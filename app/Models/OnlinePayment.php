<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlinePayment extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];

    protected $fillable = ['created_by', 'last_updated_by', 'students_id', 'date', 'amount', 'payment_gateway', 'ref_no', 'ref_text', 'status'];

}
