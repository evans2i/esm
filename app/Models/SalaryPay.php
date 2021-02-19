<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryPay extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'staff_id', 'salary_masters_id', 'date', 'allowance', 'fine', 'paid_amount','payment_mode','status'];

    public function payrollMasters()
    {
        return $this->belongsTo(PayrollMaster::class, 'id');
    }

    public function staffs()
    {
        return $this->belongsTo(Staff::class, 'id');
    }
}
