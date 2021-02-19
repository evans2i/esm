<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'hostel_id','room_type','room_number', 'rate_perbed', 'description', 'status'];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'hostel_id');
    }

    public function roomTy()
    {
        return $this->belongsTo(RoomType::class, 'room_type');
    }

    public function beds()
    {
        return $this->hasMany(Bed::class, 'room_id');
    }
}
