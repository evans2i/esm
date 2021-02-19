<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'hostel_id', 'room_id', 'bed_id', 'register_date', 'leave_date', 'student_id','status'];

    public function residentHistory()
    {
        return $this->hasMany(ResidentHistory::class, 'resident_id');
    }
    public function hostel()
    {
        return $this->belongsTo(Hostel::class, 'hostel_id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function bed()
    {
        return $this->belongsTo(Bed::class, 'bed_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
