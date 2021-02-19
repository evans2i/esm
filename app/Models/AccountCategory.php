<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountCategory extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'ac_name', 'ac_type', 'dr', 'cr', 'status'];


    public function tHead()
    {
        return $this->hasMany(TransactionHead::class, 'acc_id');
    }
}
