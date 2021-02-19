<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionHead extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'tr_head', 'ref_id', 'acc_id', 'status'];

    public function tR()
    {
        return $this->hasMany(Transaction::class, 'tr_head_id');
    }
}
