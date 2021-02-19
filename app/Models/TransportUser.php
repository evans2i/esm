<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportUser extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'routes_id', 'vehicles_id', 'user_type', 'member_id', 'status'];

    public function travellerHistory()
    {
        return $this->hasMany(TransportHistory::class, 'travellers_id','id');
    }
}
