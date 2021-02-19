<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'title', 'active_status', 'status'];

    public function attendenceMaster()
    {
        return $this->hasMany(AttendenceMaster::class, 'year');
    }
}
