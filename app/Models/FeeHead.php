<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeHead extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $table = 'fee_heads';
    protected $fillable = ['created_by', 'last_updated_by', 'fee_head_title', 'fee_head_amount', 'status'];
}
