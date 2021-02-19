<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodSchedule extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'hostels_id', 'days_id', 'eating_times_id','status'];

    public function foodItems()
    {
        return $this->belongsToMany(FoodItem::class,'food_item_food_schedule','food_schedule_id');
    }
}
