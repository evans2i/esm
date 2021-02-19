<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodItem extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'foodCategories_id','title','price','image','description','status'];

    public function schedules()
    {
        return $this->belongsToMany(FoodSchedule::class);
    }
}
