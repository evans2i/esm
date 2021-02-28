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

    public function getActiveStatusAttribute($value)
    {
        if($value == 1){
            $status = 'active';
        }elseif($value == 0){
            $status = 'in-active';
        }else{
            $status = $value;
        }
        return $status;
    }

    public function setActiveStatusttribute($value)
    {
        if($value == 'active'){
            $status = 1;
        }elseif($value == 'in-active'){
            $status = 0;
        }else{
            $status = $value;
        }

        $this->attributes['status'] = $status;
    }

    public function scopeActiveStatus($query)
    {
        return $query->where('active_status', 1);
    }

    public function scopeInActive($query)
    {
        return $query->where('active_status', 0);
    }
}
