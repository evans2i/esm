<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bed extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'hostel_id', 'room_id', 'bed_number', 'bed_status'];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'hostel_id');
    }
    public function bedSta()
    {
        return $this->belongsTo(BedStatus::class, 'bed_status');
    }
}
