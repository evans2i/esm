<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentGuardian extends Model
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['students_id', 'guardians_id'];

}
