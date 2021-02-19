<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;
    // protected $guarded = ['id'];
    protected $fillable = ['created_by', 'last_updated_by', 'code', 'name', 'category_id', 'sub_category_id', 'warranty',
        'product_image', 'description','status'];

    public function price()
    {
        return $this->hasOne(ProductPrice::class,'products_id', 'id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class,'products_id', 'id');
    }
}
