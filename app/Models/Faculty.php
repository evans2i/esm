<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $table = 'faculties';
    protected $fillable = ['created_by', 'last_updated_by', 'faculty', 'faculty_code', 'status'];

    public function semesters() {
        return $this->belongsToMany(Semester::class);
    }
}
