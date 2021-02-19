<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hostel extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'name', 'type', 'address', 'contact_detail', 'warden',
                            'warden_contact','description', 'status'];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'hostel_id');
    }

    public function residents()
    {
        return $this->hasMany(Resident::class, 'hostel_id');
    }
    public function residentHistory()
    {
        return $this->hasMany(ResidentHistory::class, 'hostel_id');
    }

    public function beds()
    {
        return $this->hasMany(Bed::class, 'hostel_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'warden','id');
    }
}
