<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseReturn extends BaseModel
{
    use SoftDeletes;
	// protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'purchase_date','invoice_no','purchase_id',
        'vendors_id', 'purchase_details_id', 'products_id', 'qty','rate', 'total_amount', 'status'];

}
