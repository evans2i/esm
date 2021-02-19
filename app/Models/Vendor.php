<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'reg_no','name', 'address', 'tel', 'mobile_1', 'mobile_2', 'email', 'extra_info', 'vendor_image','status'];


}
