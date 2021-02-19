<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibraryCirculation extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'user_type', 'slug', 'code_prefix', 'issue_limit_days','issue_limit_books',
        'fine_per_day', 'status'];

    public function libMember()
    {
        return $this->hasMany(LibraryMember::class, 'user_type');
    }

}
