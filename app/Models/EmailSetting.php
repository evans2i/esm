<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailSetting extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'driver', 'host', 'port', 'user_name', 'password', 'encryption','status'];
}
