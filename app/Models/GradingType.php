<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradingType extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'title', 'slug', 'status'];

    public function gradingScale()
    {
        return $this->hasMany(GradingScale::class, 'gradingType_id');
    }

}
