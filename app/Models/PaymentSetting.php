<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentSetting extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_at', 'updated_at', 'identity', 'logo', 'link', 'config', 'status'];
}
