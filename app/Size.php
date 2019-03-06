<?php

namespace bocaamerica;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $timestamps = false;

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function ProductSize()
    {
        return $this->hasMany(ProductSize::class);
    }
}
