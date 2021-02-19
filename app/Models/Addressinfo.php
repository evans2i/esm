<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addressinfo extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'address', 'state', 'country', 'temp_address',
        'temp_state', 'temp_country', 'home_phone', 'mobile_1', 'mobile_2', 'status'];

    public function students()
    {
        return $this->hasMany(Student::class, 'address_id');
    }

}
