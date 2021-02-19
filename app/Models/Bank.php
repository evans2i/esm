<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'bank_name','ac_name','ac_number','branch','status'];

    public function bankTransaction()
    {
        return $this->hasMany(BankTransaction::class,'banks_id','id');
    }


}
