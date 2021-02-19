<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeCollection extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    //
    protected $table = 'fee_collections';
    protected $fillable = ['created_by', 'last_updated_by', 'payment_no', 'student_id', 'fee_master_id', 'date', 'discount', 'fine', 'paid_amount','payment_mode','note','response','receipt_no','status'];

    public function feeMaster()
    {
        return $this->belongsTo(FeeMaster::class, 'fee_master_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function userUpdate()
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }
}
