<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CertificateTemplate extends BaseModel
{
	use SoftDeletes;
	  // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'certificate', 'student_photo', 'template', 'background_image','custom_css', 'background_status', 'status'];
}
